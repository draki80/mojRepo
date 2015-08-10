<?php

class selfLink {
	private $knjigaUrl;
	private $knjigaJson;
	private $knjigaDecode = array();
	public $books;

	function __construct($id) {

		$this->knjigaUrl = "https://www.googleapis.com/books/v1/volumes/" . urlencode($id);
		$this->knjigaJson = file_get_contents($this->knjigaUrl);
		$this->knjigaDecode = json_decode($this->knjigaJson);

	}
	function getTitle() {

		return $this->knjigaDecode->volumeInfo->title;
	}

	function getDesc() {

		return $this->knjigaDecode->volumeInfo->description;
	}
	function getYear() {

		return $this->knjigaDecode->volumeInfo->publishedDate;
	}

	function getPublisher() {

		return $this->knjigaDecode->volumeInfo->publisher;
	}

	function getPageCount() {

		return $this->knjigaDecode->volumeInfo->pageCount;
	}
	function getLanguage() {

		return $this->knjigaDecode->volumeInfo->language;
	}

	function getImageLinks() {

		return $this->knjigaDecode->volumeInfo->imageLinks->small;
	}
	function getWebReaderLink() {

		return $this->knjigaDecode->accessInfo->webReaderLink;
	}

}
$id = $_GET['id'];
$knjiga = new selfLink($id);

echo '<h1>' . $knjiga->getTitle() . '</h1><br>';
echo '<img src=' . $knjiga->getImageLinks() . '><br>';
echo '<h2>Kratak opis knjige:</h2><br>';
echo '<p>' . $knjiga->getDesc() . '</p><br>';
echo '<p><i>Izdavač: </i><b>';
echo $knjiga->getPublisher() . '</p></b><br>';
echo '<p><i>Jezik na kome je knjiga izdata:  </i><b>';
echo $knjiga->getLanguage() . '</p></b><br>';
echo '<a href=' . $knjiga->getWebReaderLink() . '>Link za online čitanje</a><br>';

?>