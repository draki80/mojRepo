<?php

class GoogleBooks {

	private $booksUrl;
	private $booksJson;
	private $booksDecode = array();
	public $books;

	function __construct($nameOfBook) {

		$this->booksUrl = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($nameOfBook) . "&maxResults=25&key=AIzaSyBU-t2P8rzw8AsPUxsFLYrah1E0a5MPn3Q";
		$this->booksJson = file_get_contents($this->booksUrl);
		$this->booksDecode = json_decode($this->booksJson);

	}

	function getBooksLink() {
		$this->books = $this->booksDecode->items;

		foreach ($this->books as $book) {
			echo '<a href=googleKnjiga.php?id=' . $book->id . '>Knjiga : ' . $book->volumeInfo->title . '</a><br><img src=' . $book->volumeInfo->imageLinks->thumbnail . '><br>';

		}

	}

}
if (isset($_GET['unos'])) {
	$unos = $_GET['unos'];
	$books = new GoogleBooks($unos);
	echo $books->getBooksLink();
}
;
?>


<form action ="index.php" method="GET">
<fieldset>
<legend>Unesite pojam za pretragu GoogleBooks:</legend>
<label for ="unos">Pojam za pretragu:</label><br>
<input type="text" name ="unos" id="unos"><br>
<input type="submit" value="Pretrazi...">
</fieldset>

</form>
