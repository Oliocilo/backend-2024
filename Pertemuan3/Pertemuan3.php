<?php

class Animal {
    private $animals = [];

    // Constructor mengisi data awal
    public function __construct(array $animals = []) {
        $this->animals = $animals;
    }

    // Method menampilkan seluruh data animals
    public function index() {
        foreach ($this->animals as $index => $animal) {
            echo "Hewan ke-{$index}: {$animal}<br>";
        }
    }

    // Method menambahkan hewan baru
    public function store(string $animal) {
        array_push($this->animals, $animal);
    }

    // Method memperbarui data hewan
    public function update(int $index, string $newAnimal) {
        if (isset($this->animals[$index])) {
            $this->animals[$index] = $newAnimal;
            echo "Data hewan berhasil diperbarui.<br>";
        } else {
            echo "Index tidak ditemukan.<br>";
        }
    }

    // Method menghapus data hewan
    public function destroy(int $index) {
        if (isset($this->animals[$index])) {
            unset($this->animals[$index]);
            echo "Data hewan berhasil dihapus.<br>";
        } else {
            echo "Index tidak ditemukan.<br>";
        }
    }
}

// Buat objek Animal dengan data awal
$animals = new Animal(['Kucing', 'Anjing', 'Burung']);

// Nampilin semua hewan
$animals->index();

// Nambah hewan baru
$animals->store('Ikan');

// data hewan pada indeks 1 diperbarui
$animals->update(1, 'Hiu');

// hapus hewan pada indeks 2
$animals->destroy(2);

// Nampilin semua hewan setelah perubahan
$animals->index();