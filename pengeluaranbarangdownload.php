<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Laporan-Pengeluaran.xls");
?>

<table class="table table-bordered table-hover table-striped" border="1">
					<thead>
						<tr>
							<th>No</th>
			                <th>Tanggal</th>
			                <th>Barang</th>
			                <th>Kuantitas</th>
			                <th>Admin</th>
						</tr>
					</thead>
					<tbody>
						<?php
						//koneksi ke database
						$conn = mysqli_connect("localhost","root","", "dbinventory") or die("Koneksi gagal");

						$query = isset($_POST['query'])?$_POST['query']:'';
						$result = mysqli_query($conn,$query) or die(mysqli_error());

						?>

						<?php $i = 1; ?>
						<?php while( $row = mysqli_fetch_assoc($result) ) : ?>
							<tr>
								<td style="text-align: center"><?php echo $i ?></td>
				                <td style="text-align: center"><?php echo $row['tgl_keluar'] ?></td>
				                <td><?php echo $row['nama'] ?>
				                <td style="text-align: center"><?php echo $row['kuantitas'] ?></td>
				                <td><?php echo $row['admin'] ?>
							</tr>
						<?php $i++;?>
						<?php endwhile;?>
					</tbody>
				</table>
