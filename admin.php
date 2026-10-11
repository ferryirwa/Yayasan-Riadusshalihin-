<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

$action = $_GET['action'] ?? 'list';

// Tambah Program
if ($action == 'tambah' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_program = clean_input($_POST['nama_program']);
    $deskripsi = clean_input($_POST['deskripsi']);
    $status = clean_input($_POST['status']);
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'] ?: NULL;
    
    // Handle upload gambar
    $gambar_url = '';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $upload_dir = '../uploads/program/';
        $file_name = time() . '_' . basename($_FILES['gambar']['name']);
        $target_file = $upload_dir . $file_name;
        
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            $gambar_url = 'uploads/program/' . $file_name;
        }
    }
    
    $stmt = $pdo->prepare("INSERT INTO program (nama_program, deskripsi, gambar_url, status, tanggal_mulai, tanggal_selesai) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nama_program, $deskripsi, $gambar_url, $status, $tanggal_mulai, $tanggal_selesai]);
    
    header('Location: program.php?message=Program berhasil ditambahkan');
    exit();
}

// Edit Program
if ($action == 'edit' && isset($_GET['id'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_GET['id'];
        $nama_program = clean_input($_POST['nama_program']);
        $deskripsi = clean_input($_POST['deskripsi']);
        $status = clean_input($_POST['status']);
        $tanggal_mulai = $_POST['tanggal_mulai'];
        $tanggal_selesai = $_POST['tanggal_selesai'] ?: NULL;
        
        // Jika ada gambar baru
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
            $upload_dir = '../uploads/program/';
            $file_name = time() . '_' . basename($_FILES['gambar']['name']);
            $target_file = $upload_dir . $file_name;
            
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
                $gambar_url = 'uploads/program/' . $file_name;
                $stmt = $pdo->prepare("UPDATE program SET nama_program = ?, deskripsi = ?, gambar_url = ?, status = ?, tanggal_mulai = ?, tanggal_selesai = ? WHERE id = ?");
                $stmt->execute([$nama_program, $deskripsi, $gambar_url, $status, $tanggal_mulai, $tanggal_selesai, $id]);
            }
        } else {
            $stmt = $pdo->prepare("UPDATE program SET nama_program = ?, deskripsi = ?, status = ?, tanggal_mulai = ?, tanggal_selesai = ? WHERE id = ?");
            $stmt->execute([$nama_program, $deskripsi, $status, $tanggal_mulai, $tanggal_selesai, $id]);
        }
        
        header('Location: program.php?message=Program berhasil diperbarui');
        exit();
    }
    
    // Ambil data program untuk diedit
    $stmt = $pdo->prepare("SELECT * FROM program WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $program = $stmt->fetch();
}

// Hapus Program
if ($action == 'hapus' && isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM program WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    
    header('Location: program.php?message=Program berhasil dihapus');
    exit();
}

// Ambil semua program
$stmt = $pdo->query("SELECT * FROM program ORDER BY created_at DESC");
$programs = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Program - Yayasan Kita</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Styles sama seperti dashboard, hanya berbeda content */
        /* Untuk hemat ruang, saya gunakan style yang sama dengan dashboard */
        /* Anda bisa menggabungkan style dalam satu file CSS terpisah */
    </style>
</head>
<body>
    <!-- Include Sidebar sama seperti dashboard -->
    
    <div class="main-content">
        <div class="top-bar">
            <div class="page-title">
                <h1><i class="fas fa-project-diagram"></i> Manajemen Program</h1>
                <p class="welcome-text">Kelola program-program yayasan</p>
            </div>
        </div>
        
        <?php if(isset($_GET['message'])): ?>
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                <i class="fas fa-check-circle"></i> <?php echo $_GET['message']; ?>
            </div>
        <?php endif; ?>
        
        <!-- Form Tambah/Edit Program -->
        <?php if(in_array($action, ['tambah', 'edit'])): ?>
        <div class="content-section">
            <h2><?php echo $action == 'tambah' ? 'Tambah Program' : 'Edit Program'; ?></h2>
            
            <form method="POST" enctype="multipart/form-data" style="margin-top: 20px;">
                <div class="form-group">
                    <label>Nama Program</label>
                    <input type="text" name="nama_program" class="form-control" 
                           value="<?php echo isset($program) ? $program['nama_program'] : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="5" required><?php echo isset($program) ? $program['deskripsi'] : ''; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                    <?php if(isset($program) && $program['gambar_url']): ?>
                        <small>Gambar saat ini: <?php echo $program['gambar_url']; ?></small>
                    <?php endif; ?>
                </div>
                
                <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
                    <div class="form-group" style="flex: 1;">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="aktif" <?php echo (isset($program) && $program['status'] == 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                            <option value="selesai" <?php echo (isset($program) && $program['status'] == 'selesai') ? 'selected' : ''; ?>>Selesai</option>
                            <option value="rencana" <?php echo (isset($program) && $program['status'] == 'rencana') ? 'selected' : ''; ?>>Rencana</option>
                        </select>
                    </div>
                    
                    <div class="form-group" style="flex: 1;">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control" 
                               value="<?php echo isset($program) ? $program['tanggal_mulai'] : date('Y-m-d'); ?>" required>
                    </div>
                    
                    <div class="form-group" style="flex: 1;">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control" 
                               value="<?php echo isset($program) ? $program['tanggal_selesai'] : ''; ?>">
                    </div>
                </div>
                
                <button type="submit" class="btn-primary">Simpan Program</button>
                <a href="program.php" class="btn btn-secondary" style="background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none; display: inline-block; margin-left: 10px;">
                    Batal
                </a>
            </form>
        </div>
        <?php else: ?>
        
        <!-- List Program -->
        <div class="content-section">
            <div class="section-header">
                <h2>Daftar Program</h2>
                <a href="program.php?action=tambah" class="btn-primary">Tambah Program</a>
            </div>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Program</th>
                            <th>Status</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($programs as $program): ?>
                        <tr>
                            <td><?php echo $program['nama_program']; ?></td>
                            <td>
                                <?php if($program['status'] == 'aktif'): ?>
                                    <span class="badge badge-success">Aktif</span>
                                <?php elseif($program['status'] == 'selesai'): ?>
                                    <span class="badge badge-warning">Selesai</span>
                                <?php else: ?>
                                    <span class="badge badge-info">Rencana</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo date('d M Y', strtotime($program['tanggal_mulai'])); ?></td>
                            <td><?php echo $program['tanggal_selesai'] ? date('d M Y', strtotime($program['tanggal_selesai'])) : '-'; ?></td>
                            <td class="action-buttons">
                                <a href="program.php?action=edit&id=<?php echo $program['id']; ?>" class="btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="program.php?action=hapus&id=<?php echo $program['id']; ?>" class="btn-delete" onclick="return confirm('Hapus program ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>