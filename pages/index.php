<?php
    session_start();
    if(isset($_SESSION['id_user']));
    include "../config/koneksi.php";
    include "../controller/auth_user.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CV. SAP | DASHBOARD</title>
    <?php
        include "../view/dashboard/css.php";
    ?>
</head>

<body class="theme-light-blue">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <?php
        include "../view/navbar/topbar.php";
    ?>

    <!-- Menuju Menu Sesuai Hak Akses -->
    <?php

    if($_SESSION['id_user'] == 3 ) {
        require('../view/navbar/salesmenu.php');
    }else if ($_SESSION['id_user'] == 4 ) {
        require('../view/navbar/produksimenu.php');
    }else if ($_SESSION['id_user'] == 5 ) {
        require('../view/navbar/gudangmenu.php');
    }else if ($_SESSION['id_user'] == 6 ) {
        require('../view/navbar/purchasingmenu.php');
    }

    ?>

    <!-- Routing Menu -->
    <?php
    if (isset($_GET['pengeluaran_produk'])){
          include "../pages/pengeluaran_produk/index.php";

      }else if (isset($_GET['pengeluaran_bahan_baku'])){
         include "../pages/pengeluaran_bahan_baku/index.php";

     }else if (isset($_GET['penerimaan_produk'])){
         include "../pages/penerimaan_produk/index.php";

     }else if (isset($_GET['penerimaan_bahan_baku'])){
          include "../pages/penerimaan_bahan_baku/index.php";

       }else if (isset($_GET['pemesanan_produk'])){
         include "../pages/pemesanan_produk/index.php";

      }else if (isset($_GET['bahan_baku'])){
         include "../pages/bahan_baku/index.php";

      }else if (isset($_GET['retur'])){
         include "../pages/retur_produk/index.php";

     }else if (isset($_GET['komposisi_produk'])){
         include "../pages/komposisi_produk/index.php";

      }else if (isset($_GET['pemantauan-produksi'])){
         include "../pages/pemantauan_produksi/index.php";

      }else if (isset($_GET['produk'])){
         include "../pages/produk/index.php";

      }else if (isset($_GET['order-produk'])){
         include "../pages/order/index.php";

      }else if (isset($_GET['order-produks'])){
         include "../pages/order/order.php";

      }else if (isset($_GET['order-custom'])){
         include "../pages/order/index_custom.php";

      }else if (isset($_GET['order-confirm'])){
         include "../pages/order/confirm.php";


      }else if (isset($_GET['shop-product'])){
         include "../pages/shop/index.php";



      }else if (isset($_GET['pelanggan'])){
         include "../pages/pelanggan/index.php";

      }else if (isset($_GET['supplier'])){
         include "../pages/supplier/index.php";

      }else if (isset($_GET['peramalan_produk'])){
         include "../pages/peramalan_produk/index.php";


      }else if (isset($_GET['tambah-peramalan'])){
         include "peramalan_produk/add.php";

      }else if (isset($_GET['tambah-bahanbaku'])){
         include "bahan_baku/add.php";
      }else if (isset($_GET['id_bahan_baku'])){
         include "bahan_baku/edit.php";

      }else if (isset($_GET['tambah-pelanggan'])){
         include "pelanggan/add.php";
      }else if (isset($_GET['id_pelanggan'])){
         include "pelanggan/edit.php";

      }else if (isset($_GET['tambah-produk'])){
         include "produk/add.php";
      }else if (isset($_GET['id_produk'])){
         include "produk/edit.php";

     }else if (isset($_GET['tambah_komposisi_produk'])){
         include "komposisi_produk/add.php";
     }else if (isset($_GET['edit_komposisi_produk'])){
         include "komposisi_produk/edit.php";

     }else if (isset($_GET['detail_komposisi_produk'])){
         include "komposisi_produk/detail.php";
      }else if (isset($_GET['tambah-pemantauan'])){
         include "pemantauan_produksi/add.php";
      }else if (isset($_GET['id_monitoring_produksi'])){
         include "pemantauan_produksi/edit.php";

      }else if (isset($_GET['tambah-supplier'])){
         include "supplier/add.php";
      }else if (isset($_GET['id_supplier'])){
         include "supplier/edit.php";

     }else if (isset($_GET['tambah_penerimaan_bahan_baku'])){
         include "penerimaan_bahan_baku/add.php";
     }else if (isset($_GET['edit_penerimaan_bahan_baku'])){
         include "penerimaan_bahan_baku/edit.php";

     }else if (isset($_GET['tambah_penerimaan_produk'])){
          include "penerimaan_produk/add.php";
      }else if (isset($_GET['edit_penerimaan_produk'])){
          include "penerimaan_produk/edit.php";

      }else if (isset($_GET['tambah_pengeluaran_bahan_baku'])){
           include "pengeluaran_bahan_baku/add.php";
       }else if (isset($_GET['edit_pengeluaran_bahan_baku'])){
           include "pengeluaran_bahan_baku/edit.php";

       }else if (isset($_GET['tambah_pengeluaran_produk'])){
            include "pengeluaran_produk/add.php";
        }else if (isset($_GET['edit_pengeluaran_produk'])){
            include "pengeluaran_produk/edit.php";

         }else if (isset($_GET['no_invoice'])){
         include "order/rincian.php";

      }else if (isset($_GET['komposisi'])){
         include "../produk/komposisi.php";

      }else if (isset($_GET['logout'])){
         include "../controller/logout.php";
      }else{
          include "../pages/dashboard/index.php";
      }
      ?>

   <?php
        include "../view/dashboard/js.php";
    ?>
</body>

</html>
<?php
    mysqli_close($konek);
    ob_end_flush();
?>
