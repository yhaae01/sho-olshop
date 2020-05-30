<html>

<head>
	<title>Laporan Penjualan</title>
</head>

<body>
	<style>
		.table-data {
			width: 100%;
			border-collapse: collapse;
		}

		.table-data tr th,
		.table-data tr td {
			border: 1px solid black;
			font-size: 11pt;
			font-family: Verdana, Geneva, Tahoma, sans-serif;
			padding: 10px 10px 10px 10px;
		}

		h3 {
			font-family: Verdana, Geneva, Tahoma, sans-serif;
		}

	</style>

	<h3>
		<center>Laporan Data Penjualan</center>
	</h3>
	<br>
	<table class="table-data">
		<thead>
			<tr>
				<th>No</th>
				<th>Nomor Pesanan</th>
				<th>Tanggal</th>
				<th>Total Belanja</th>
				<th>Status</th>
				<th>Resi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
                $no = 1;
                foreach($order as $ord){
            ?>
			<tr align=center>
				<th scope="row"><?= $no++; ?></th>
				<td><?= $ord['invoice']; ?></td>
				<td><?= $ord['date']; ?></td>
				<td><?= $ord['total']; ?></td>
				<td><?= $ord['status']; ?></td>
				<td><?= $ord['resi']; ?></td>
			</tr>
			<?php 
            }
            ?>
		</tbody>
    </table>
    
    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>
