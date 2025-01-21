<?php
use App\Models\Barang;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiswasController;
use App\Http\Controllers\PpdbsController;
use App\Http\Controllers\PenggunasController;
use App\Http\Controllers\TeleponController;
use App\Http\Controllers\KategorisController;
use App\Http\Controllers\ProduksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Kamis 6 Nov 2024
Route::get('/', function () {
    return view('welcome');

});

Route::get('/Home', function () {
    return '<h1>Assalamualaikum</h1>'
        . '<h3> Ini Home Abel Selamat Datang </h3>'
        . 'Ini adalah pertama kalinya saya mencoba laravel';

});

Route::get('/About', function () {
    return 'Selamat datang di halaman About'
        . '<table border="1">
        <tr>
            <td> Ini adalah ini wkwkwk </td>
        </tr>
    </table>';

});

Route::get('/Contact', function () {
    return 'Ini adalah kontak saya';

});

// Jum'at 7 Nov 2024

Route::get('/tes/{Nama2}/{Umur2}/{Gender2}/{Lahir2}/{Alamat2}/{Agama2}', function ($Nama, $Umur, $Gender, $Lahir, $Alamat, $Agama) {
    return "Nama :" . $Nama . "<br>"
        . "Umur :" . $Umur . "<br>"
        . "Gender :" . $Gender . "<br>"
        . "Lahir :" . $Lahir . "<br>"
        . "Alamat :" . $Alamat . "<br>"
        . "Agama :" . $Agama . "<br>";

});

Route::get('/Hitung/{Bilangan1}/{Bilangan2}', function ($Bilangan1, $Bilangan2) {
    $Hasil = $Bilangan1 + $Bilangan2;

    return "Bilangan 1 : " . $Bilangan1 . "<br>"
        . "Bilangan 2 : " . $Bilangan2 . "<br>"
        . "Hasil : " . $Hasil . "<br>";
});

Route::get('/Hitung-Bagi/{Bilangan1}/{Bilangan2}', function ($Bilangan1, $Bilangan2) {
    $Hasil = $Bilangan1 / $Bilangan2;

    return "Bilangan 1 : " . $Bilangan1 . "<br>"
        . "Bilangan 2 : " . $Bilangan2 . "<br>"
        . "Hasil :" . $Hasil . "<br>";

});

// Senin, 6 Januari 2025
// Route::get('/Siswa', function () {
//     $Data_Siswa = ['Keyndra', 'Napis', 'Opet', 'Abel', 'Daffa'];

//     return view('Tampil', compact('Data_Siswa'));
// });

// Routing dengan Model
// Route::get('Post', function () {
//     $post = Post::all();
//     return view('tampil_post', compact('post'));
// });

// Routing dengan Controller
Route::get('/post', [PostController::class, 'Menampilkan']);
Route::get('/barang', [PostController::class, 'Menampilkan2']);

// CRUD
Route::resource('siswa', SiswasController::class);
Route::resource('ppdb', PpdbsController::class);

Route::resource('pengguna', PenggunasController::class);
Route::resource('telepon', TeleponController::class);

Route::resource('kategori', KategorisController::class);
Route::resource('produk', ProduksController::class);


// Routing barang dengan model
// Route::get('Barang', function () {
//     $barang = Barang::all();
//     return view('tampil_barang', compact('barang'));

// });

// Jum'at 7 Nov 2024 TUGAS
// NEKSTIM JANGAN PAKE ECHO DALAM IF TAPI DLUARRRRRRRRRRRRRRRRRR PANJANG COK JADINYA!!!!!!!!!!!!!!
Route::get('/Tugas1/{Nama2}/{Telpon2}/{JBarang2}/{NBarang2}/{Jumlah2}/{Pembayaran2}', function ($Nama, $Telpon, $JBarang, $NBarang, $Jumlah, $Pembayaran) {
    $Barang = [
        "Poco" => 3000000,
        "Samsung" => 5000000,
        "Iphone" => 15000000,

        "Lenovo" => 4000000,
        "Acer" => 8000000,
        "Macbook" => 20000000,

        "Toshiba" => 5000000,
        "SamsungTV" => 8000000,
        "LG" => 10000000,
    ];

    // Baris 1

    echo "Nama Pembeli : " . $Nama . "<br>";
    echo "Telpon : " . $Telpon . "<br>";
    echo "<hr>";

    // Baris2

    if ($JBarang == "HP") {
        echo "Jenis Barang : " . "Handphone" . "<br>";

        if ($NBarang == "Poco") {
            echo "Jenis Barang : " . "Poco" . "<br>";
            echo "Harga Barang : " . number_format($Barang['Poco']) . "<br>";

            echo "Jumlah Barang : " . $Jumlah . "<br>";

            $Total = $Barang['Poco'] * $Jumlah;

            echo "Total : " . number_format($Total) . "<br>";
            echo "<hr>";

            $Cashback = 500000;
            if ($Total >= 10000000) {

                echo "Cashback : " . number_format($Cashback) . "<br>";
            } else {
                echo "Cashback : None" . "<br>";
            }

            if ($Pembayaran == "Transfer") {
                $Potongan = 50000;
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : " . number_format($Potongan) . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }
            } else {
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : None" . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }

            }
        } elseif ($NBarang == "Iphone") {
            echo "Jenis Barang : " . "Iphone" . "<br>";
            echo "Harga Barang : " . number_format($Barang['Iphone']) . "<br>";

            echo "Jumlah Barang : " . $Jumlah . "<br>";

            $Total = $Barang['Iphone'] * $Jumlah;

            echo "Total : " . number_format($Total) . "<br>";
            echo "<hr>";

            $Cashback = 500000;
            if ($Total >= 10000000) {

                echo "Cashback : " . number_format($Cashback) . "<br>";
            } else {
                echo "Cashback : None" . "<br>";
            }

            if ($Pembayaran == "Transfer") {
                $Potongan = 50000;
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : " . number_format($Potongan) . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }
            } else {
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : None" . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }

            }
        } elseif ($NBarang == "Samsung") {
            echo "Jenis Barang : " . "Samsung" . "<br>";
            echo "Harga Barang : " . number_format($Barang['Samsung']) . "<br>";

            echo "Jumlah Barang : " . $Jumlah . "<br>";

            $Total = $Barang['Samsung'] * $Jumlah;

            echo "Total : " . number_format($Total) . "<br>";
            echo "<hr>";

            $Cashback = 500000;
            if ($Total >= 10000000) {

                echo "Cashback : " . number_format($Cashback) . "<br>";
            } else {
                echo "Cashback : None" . "<br>";
            }

            if ($Pembayaran == "Transfer") {
                $Potongan = 50000;
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : " . number_format($Potongan) . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }
            } else {
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : None" . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }

            }
        } else {
            echo "Bruv Error";
        }
    } elseif ($JBarang == "Laptop") {
        echo "Jenis Barang : " . "Laptop" . "<br>";

        if ($NBarang == "Lenovo") {
            echo "Jenis Barang : " . "Lenovo" . "<br>";
            echo "Harga Barang : " . number_format($Barang['Lenovo']) . "<br>";

            echo "Jumlah Barang : " . $Jumlah . "<br>";

            $Total = $Barang['Lenovo'] * $Jumlah;

            echo "Total : " . number_format($Total) . "<br>";
            echo "<hr>";

            $Cashback = 500000;
            if ($Total >= 10000000) {

                echo "Cashback : " . number_format($Cashback) . "<br>";
            } else {
                echo "Cashback : None" . "<br>";
            }

            if ($Pembayaran == "Transfer") {
                $Potongan = 50000;
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : " . number_format($Potongan) . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }
            } else {
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : None" . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }

            }

        } elseif ($NBarang == "Acer") {
            echo "Jenis Barang : " . "Acer" . "<br>";
            echo "Harga Barang : " . number_format($Barang['Acer']) . "<br>";

            echo "Jumlah Barang : " . $Jumlah . "<br>";

            $Total = $Barang['Acer'] * $Jumlah;

            echo "Total : " . number_format($Total) . "<br>";
            echo "<hr>";

            $Cashback = 500000;
            if ($Total >= 10000000) {

                echo "Cashback : " . number_format($Cashback) . "<br>";
            } else {
                echo "Cashback : None" . "<br>";
            }

            if ($Pembayaran == "Transfer") {
                $Potongan = 50000;
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : " . number_format($Potongan) . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }
            } else {
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : None" . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }

            }

        } elseif ($NBarang == "Macbook") {
            echo "Jenis Barang : " . "Macbook" . "<br>";
            echo "Harga Barang : " . number_format($Barang['Macbook']) . "<br>";

            echo "Jumlah Barang : " . $Jumlah . "<br>";

            $Total = $Barang['Macbook'] * $Jumlah;

            echo "Total : " . number_format($Total) . "<br>";
            echo "<hr>";

            $Cashback = 500000;
            if ($Total >= 10000000) {

                echo "Cashback : " . number_format($Cashback) . "<br>";
            } else {
                echo "Cashback : None" . "<br>";
            }

            if ($Pembayaran == "Transfer") {
                $Potongan = 50000;
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : " . number_format($Potongan) . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }
            } else {
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : None" . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }

            }

        } else {
            echo "Bruv Error";
        }
    } elseif ($JBarang == "TV") {
        echo "Jenis Barang : " . "TV" . "<br>";

        if ($NBarang == "Toshiba") {
            echo "Jenis Barang : " . "Toshiba" . "<br>";
            echo "Harga Barang : " . number_format($Barang['Toshiba']) . "<br>";

            echo "Jumlah Barang : " . $Jumlah . "<br>";

            $Total = $Barang['Toshiba'] * $Jumlah;

            echo "Total : " . number_format($Total) . "<br>";
            echo "<hr>";

            $Cashback = 500000;
            if ($Total >= 10000000) {

                echo "Cashback : " . number_format($Cashback) . "<br>";
            } else {
                echo "Cashback : None" . "<br>";
            }

            if ($Pembayaran == "Transfer") {
                $Potongan = 50000;
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : " . number_format($Potongan) . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }
            } else {
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : None" . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }

            }

        } elseif ($NBarang == "SamsungTV") {
            echo "Jenis Barang : " . "SamsungTV" . "<br>";
            echo "Harga Barang : " . number_format($Barang['SamsungTV']) . "<br>";

            echo "Jumlah Barang : " . $Jumlah . "<br>";

            $Total = $Barang['SamsungTV'] * $Jumlah;

            echo "Total : " . number_format($Total) . "<br>";
            echo "<hr>";

            $Cashback = 500000;
            if ($Total >= 10000000) {

                echo "Cashback : " . number_format($Cashback) . "<br>";
            } else {
                echo "Cashback : None" . "<br>";
            }

            if ($Pembayaran == "Transfer") {
                $Potongan = 50000;
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : " . number_format($Potongan) . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total - $Potongan;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }
            } else {
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : None" . "<br>";

                if ($Total >= 10000000) {
                    $TotalAkhir = $Total - $Cashback;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                } elseif ($Total <= 10000000) {
                    $TotalAkhir = $Total;

                    echo "Total Pembayaran : " . number_format($TotalAkhir);
                }

            }

        } elseif ($NBarang == "LG") {
            echo "Jenis Barang : " . "LG" . "<br>";
            echo "Harga Barang : " . number_format($Barang['LG']) . "<br>";

            echo "Jumlah Barang : " . $Jumlah . "<br>";

            $Total = $Barang['LG'] * $Jumlah;

            echo "Total : " . number_format($Total) . "<br>";
            echo "<hr>";

            $Cashback = 500000;
            if ($Total >= 10000000) {

                echo "Cashback : " . number_format($Cashback) . "<br>";
            } else {
                echo "Cashback : None" . "<br>";
            }

            if ($Pembayaran == "Transfer") {
                $Potongan = 50000;
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : " . number_format($Potongan) . "<br>";

                $TotalAkhir = $Total - $Cashback - $Potongan;

                echo "Total Pembayaran : " . number_format($TotalAkhir);
            } else {
                echo "Pembayaran : " . $Pembayaran . "<br>";
                echo "Potongan : None" . "<br>";

                $TotalAkhir = $Total - $Cashback;
                echo "Total Pembayaran : " . number_format($TotalAkhir);
            }

        } else {
            echo "Bruv Error";
        }
    } else {
        echo "Error";
    }

});

// NEKSTIM JANGAN PAKE ECHO DALAM IF TAPI DLUARRRRRRRRRRRRRRRRRR PANJANG COK JADINYA!!!!!!!!!!!!!!

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
