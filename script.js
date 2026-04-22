/**
 * MATERI: JavaScript External & Variabel
 * Disimpan dalam file script.js
 */

// Menggunakan const untuk nilai tetap, let untuk nilai yang bisa berubah
const namaPemilik = "Raina"; 
let statusWebsite = "Aktif";

// Output Dasar ke Console untuk Debugging
console.log("Halo! Selamat datang di sistem " + namaPemilik);
console.log("Status Website: " + statusWebsite);

/**
 * MATERI: Tipe Data & DOM (Document Object Model)
 * Mengambil elemen menggunakan querySelector
 */

// 1. Mengambil elemen Header (Tag)
const judulHeader = document.querySelector("header h1");
// 2. Mengubah isi teks melalui DOM
judulHeader.innerHTML = "Web Programming with " + namaPemilik;

// 3. Mengambil elemen form (Class & Tag)
const inputNama = document.querySelector('input[type="text"]');
const inputEmail = document.querySelector('input[type="email"]');
const formDosen = document.querySelector("form");

/**
 * MATERI: Fungsi & Arrow Function
 * Fungsi untuk memberikan validasi sederhana
 */

// Arrow Function untuk menyapa user
const sapaUser = (nama) => {
    return "Halo " + nama + ", pesan kamu sedang diproses oleh sistem!";
};

/**
 * MATERI: Logic (If...Else) & Interaction
 * Menangani event klik pada form
 */

formDosen.addEventListener("submit", (event) => {
    // Mencegah halaman refresh saat submit
    event.preventDefault(); 
    
    const namaMahasiswa = inputNama.value;
    
    if (namaMahasiswa === "") {
        alert("Ops! Kamu lupa mengisi nama.");
    } else {
        // Memanggil fungsi sapaUser
        const pesan = sapaUser(namaMahasiswa);
        alert(pesan);
        console.log("Data dikirim oleh: " + namaMahasiswa);
    }
});

/**
 * MATERI: Perulangan (Loop)
 * Contoh penggunaan Loop untuk mencetak data mata kuliah di console
 */

let daftarMatkul = ["Pemrograman Web", "Sistem Operasi", "Basis Data"];

console.log("--- Daftar Mata Kuliah Tersedia ---");
for (let i = 0; i < daftarMatkul.length; i++) {
    console.log((i + 1) + ". " + daftarMatkul[i]);
}

/**
 * MATERI: Manipulasi Style via DOM
 * Membuat efek interaktif tambahan pada kartu materi
 */

const cards = document.querySelectorAll(".card");

cards.forEach((card) => {
    card.addEventListener("mouseenter", () => {
        card.style.borderColor = "var(--pink-deep)";
    });
    
    card.addEventListener("mouseleave", () => {
        card.style.borderColor = "transparent";
    });
});