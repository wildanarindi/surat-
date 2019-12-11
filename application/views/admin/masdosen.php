<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Master Dosen</h1>



  
<style>
body {
    background-image: url("<?php echo base_url(); ?>");
    } 
 </style>
<a href="<?php echo base_url().''; ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Tambah Dosen</a>
<br/><br/>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="example1">
		<thead style="background-color:#F47C48">
			<tr>
				<th>No</th>
				<th>Nama Anggota</th>
				<th>Jenis Kelamin</th>
				<th>No. Telp</th>
				<th>Alamat</th>
				<th>Email</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach($mas_dsn as $db){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
                <td><?php echo $db->nip ?></td>
				<td><?php echo $db->nama ?></td>
				<td><?php echo $db->jabatan ?></td>
				<td><?php echo $db->alamat ?></td>
				<td><?php echo $db->agama ?></td>
				<td><?php echo $db->no_hp ?></td>
				
				<td nowrap="nowrap" align="center">
					<a class="btn btn-primary btn-sm" href="<?php echo base_url().''.$b->nip; ?>"><span class="	glyphicon glyphicon-edit"> </span></a>
					<a class="btn btn-warning btn-sm" href="<?php echo base_url().''.$b->nip; ?>"><span class="glyphicon glyphicon-trash"></span></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#table-datatable").dataTable();
	});
	$('.alert-message').alert().delay(3000).slideUp('slow');
	</script>
</div>
