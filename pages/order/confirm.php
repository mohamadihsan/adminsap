<?php 
include '../config/koneksi.php';

$fn = 'convert_to_rupiah';
function convert_to_rupiah($angka)
    {return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));}; // Setting Untuk Fungsi Rupiah 


$querypelanggan = mysqli_query($konek, "SELECT * FROM cart");
if($querypelanggan == false){
  die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($data = mysqli_fetch_array($querypelanggan)){

?>

<section class="content">
        <div class="container-fluid">
            <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr td:nth-child(3) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(3) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="../../assets/images/logo_warna.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: <?php echo $data['no_invoice']; ?><br>
                                Dibuat : <?php echo date("d-m-Y"); ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan='3'>
                    <table>
                        <tr>
                            <td>
                                CV. SAP<br>
                                Jl. Pungkur<br>
                                Bandung
                            </td>
                            
                            <td>
                                <?php echo $data['nama_pelanggan']; ?></br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class='heading'>
                <td>
                    Nama Produk
                </td>
                <td>
                    Qty
                </td>
                <td>
                    Harga
                </td>
            </tr>
            
            <?php
               include '../config/koneksi.php';

            $querypelanggan = mysqli_query($konek, "SELECT * FROM cart inner join produk on cart.id_produk = produk.id_produk GROUP BY cart.id_produk ORDER BY cart.harga");
                if($querypelanggan == false){
                 die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($data = mysqli_fetch_array($querypelanggan)){
            
            echo" <tr class='item'>
                <td>
                    $data[nama_produk]
                </td>
                <td>
                    $data[qty] 
                </td>
                <td>
                     {$fn($data["harga"])}
                </td>
            </tr>";
        }
            ?>
            
            <?php
               include '../config/koneksi.php';

            $querytotal = mysqli_query($konek, "SELECT sum(harga) as total FROM cart");
                if($querytotal == false){
                 die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($data_total = mysqli_fetch_array($querytotal)){
            echo " <tr class='total'>
                <td></td>
                <td></td>
                
                <td>
                   Total: {$fn($data_total["total"])}
                </td>
            </tr>";
        }
      ?>

        </table>
         <a href="../controller/order/checkout.php" class="btn btn-lg bg-gradient waves-effect">KONFIRMASI</a>
      <a href="index.php?order-produks" class="btn btn-lg bg-gradient waves-effect">ULANG</a></div>
         </div>            
</section>
    <?php
      }
    ?>
    