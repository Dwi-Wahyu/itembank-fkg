<?php
$tab   = $tab ?? 'review';
$pages = max(1, (int)ceil(($total ?: 0) / ($per ?: 20)));
function qurl_part($p=[]){ return current_url().'?'.http_build_query(array_merge($_GET,$p)); }
?>
<div class="card">
  <div class="table-responsive">
    <table class="table table-sm align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th style="width:140px">Opsi</th>
          <th>Kode</th>
          <th>Nama Ujian</th>
          <th>Departemen</th>
          <th>Blok</th>
          <th>Tanggal</th>
         
          <th class="text-end">Peserta</th>
        </tr>
      </thead>
      <tbody>
      <?php if (empty($rows)): ?>
        <tr><td colspan="7" class="text-center py-4 text-muted">Tidak ada data.</td></tr>
      <?php else: foreach ($rows as $r): $acc = (int)($r['review_acc'] ?? 0) === 1; ?>
        <tr>
          <td>
           <div class="btn-group btn-group-sm">
  <a class="btn btn-outline-secondary" title="Detail"
     href="<?= site_url('admin/ujian/praktek/detail/'.$r['id']) ?>">
     <i class="bi bi-search"></i>
  </a>
  <?php if (!$acc): ?>
    <button class="btn btn-outline-primary btn-edit" title="Edit"
            data-id="<?= $r['id'] ?>"><i class="bi bi-pencil-square"></i></button>
    <button class="btn btn-outline-danger btn-del" title="Hapus"
            data-url="<?= site_url('admin/ujian/praktek/delete/'.$r['id']) ?>">
            <i class="bi bi-trash"></i></button>
  <?php endif; ?>
</div>

          </td>
          <td><?= esc($r['kode']) ?></td>
          <td><?= esc($r['nama_ujian']) ?></td>
          <td><?= esc($r['departemen'] ?: 'Semua Departemen') ?></td>
          <td><?= esc($r['blok_nama'] ?: 'Semua Blok') ?></td>
         <td><?= esc(tgl_id($r['tanggal'])) ?></td>

          <td class="text-end"><?= number_format((int)($r['jml_peserta'] ?? 0)) ?></td>
        </tr>
      <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>

  <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-2">
    <div class="small text-muted">
      Menampilkan <?= count($rows)?(($page-1)*$per+1):0 ?>–<?= (($page-1)*$per + count($rows)) ?> dari <?= $total ?> entri
    </div>
    <nav>
      <?= render_pagination($page, $pages, function($p) { return qurl_part(['page' => $p]); }) ?>
    </nav>
  </div>
</div>
