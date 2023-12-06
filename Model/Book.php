<?php
include __DIR__ . "/Genre.php";
include __DIR__ . "/Product.php";

class Book extends Product
{
    private int $id;
    private string $title;
    private string $overview;
    private string $image;
    private array $authors;
    private array $genres;

    function __construct($id, $title, $overview, $authors, $image, $genres, $quantity, $price)
    {
        parent::__construct($price, $quantity);
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->image = $image;
        $this->authors = $authors;
        $this->genres = $genres;
    }

    private function getAuthors()
    {
        $template = "<p>";
        foreach ($this->authors as $author) {
            $template .= '<span>' . $author . ' - </span>';
        }
        $template .= "</p>";
        return $template;
    }

    private function formatGenres()
    {
        $template = "<p>";
        foreach ($this->genres as $genre) {
            $template .= '<span>' . $genre->drawGenre() . ' - </span>';
        }
        $template .= "</p>";
        return $template;
    }

    public function setDiscount($title)
    {
        if ($title == 'Specification by Example') {
            return 20;
        } else {
            return 0;
        }
    }

    public function printCard()
    {
        $sconto = $this->setDiscount($this->title);
        $discountedPrice = $this->getDiscountedPrice($sconto);

        $image = $this->image;
        $title = strlen($this->title) > 28 ? substr($this->title, 0, 28) . '...' : $this->title;
        $content = substr($this->overview, 0, 100) . '...';
        $custom = $this->getAuthors();
        $genre = $this->formatGenres();
        $quantity = $this->quantity;
        $price = $this->price;

        include __DIR__ . '/../Views/card.php';
    }

    public static function fetchAll()
    {
        $bookString = file_get_contents(__DIR__ . "/books_db.json");
        $bookList = json_decode($bookString, true);

        $books = [];
        $genres = Genre::fetchAll();
        foreach ($bookList as $item) {
            $rand_genres = [];
            $rand_genres[] = $genres[rand(0, count($genres) - 1)];
            $price = rand(5, 200);
            $quantity = rand(1, 10);
            $books[] = new Book(
                $item['_id'],
                $item['title'],
                $item['longDescription'],
                $item['authors'],
                $item['thumbnailUrl'],
                $rand_genres,
                $quantity,
                $price
            );
        }
        return $books;
    }

    private function getDiscountedPrice($sconto)
    {
        return $sconto > 0 ? $this->price - ($this->price * $sconto / 100) : $this->price;
    }
}
?>