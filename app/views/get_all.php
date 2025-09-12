<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Records</title>
  <style>
    :root{
      --bg:#0f172a; 
      --panel:#111827; 
      --muted:#1f2937; 
      --muted-2:#374151; 
      --text:#e5e7eb; 
      --text-dim:#9ca3af;
      --primary:#22d3ee; 
      --primary-2:#06b6d4; 
      --danger:#ef4444; 
      --success:#22c55e; 
      --radius:16px; 
      --shadow:0 10px 25px rgba(0,0,0,.35);
    }
    *{box-sizing:border-box}
    body {
      margin:0;
      min-height:100svh;
      display:grid;
      place-items:center;
      background:linear-gradient(180deg,var(--bg),#0b1229 60%);
      color:var(--text);
      font:20px/1.45 "Playfair Display", Georgia, serif;
    }
    .card{
      width:min(1000px,95vw);
      background:linear-gradient(180deg,var(--panel),#0c1328);
      border:1px solid rgba(255,255,255,.06);
      border-radius:var(--radius);
      box-shadow:var(--shadow);
      padding:22px;
    }
    h2 {
      margin:0 0 16px;
      font-size:clamp(40px,3vw,26px);
      text-align:center;
      color:var(--primary);
    }
    table {
      width:100%;
      border-collapse:collapse;
      overflow:hidden;
      border-radius:12px;
      background:var(--muted);
      color:var(--text);
    }
    th, td {
      padding:12px 14px;
      text-align:left;
      border-bottom:1px solid var(--muted-2);
    }
    th {
      background:var(--muted-2);
      color:var(--text);
    }
    tr:nth-child(even) { background:rgba(255,255,255,.02); }
    tr:hover { background:rgba(34,211,238,.08); 
    }

    .btn {
      padding:8px 14px;
      border:none;
      border-radius:10px;
      cursor:pointer;
      font-size:13px;
      font-weight:600;
      transition:transform .2s, opacity .2s;
      text-decoration:none;
      display:inline-block;
    }
    .btn:hover { transform:translateY(-2px); 
    }
    
    .actions {
      text-align:Left;
      margin-top:20px;

    }
    
    .btn-add { 
       background:linear-gradient(180deg,var(--primary),var(--primary-2)); 
       color:#06222a;
        font-size:16px;     
        padding:12px 20px;    
        margin:20px 0;       
    }


    .btn-edit { 
      background:#22c55e; 
      color:#06222a;
    }
    .btn-edit:hover { opacity:.85; }
    .btn-delete { 
      background:#ef4444; 
      color:white;
    }
    .btn-delete:hover { opacity:.85; }

    /* Pagination container */
.pagination {
  margin-top: 25px;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 6px;
}

/* Links */
.pagination a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 40px;
  height: 40px;
  padding: 0 12px;
  font-size: 15px;
  font-weight: 600;
  border-radius: 10px;
  border: 1px solid var(--muted-2);
  background: var(--muted);
  color: var(--text-dim);
  text-decoration: none;
  transition: all 0.2s ease;
}

/* Hover effect */
.pagination a:hover {
  background: rgba(34,211,238,.15);
  color: var(--primary);
  border-color: var(--primary);
  transform: translateY(-2px);
  box-shadow: 0 0 8px rgba(34,211,238,0.4);
}

/* Active page */
.pagination .active {
  background: linear-gradient(180deg, var(--primary), var(--primary-2));
  color: #06222a !important;
  border-color: var(--primary-2);
  box-shadow: 0 0 12px rgba(34,211,238,.6);
  font-weight: 700;
}

/* Disabled state */
.pagination .disabled {
  background: var(--muted-2);
  border-color: var(--muted-2);
  color: #555 !important;
  cursor: not-allowed;
  opacity: 0.5;
  box-shadow: none;
}

/* Flex layout for actions */
.actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 12px;
  margin: 20px 0;
}

/* Search bar container (right aligned) */
.search-container {
  margin-left: auto;   /* pushes it to the right */
  display: flex;
  align-items: center;
  gap: 8px;
}

/* Search input */
.search-box {
  padding: 10px 14px;
  padding-left: 38px; /* space for emoji */
  border-radius: 10px;
  border: 1px solid var(--muted-2);
  background: var(--muted);
  color: var(--text);
  font-size: 14px;
  min-width: 220px;
  outline: none;
  transition: all 0.2s ease;
  background-size: 18px;
  background-repeat: no-repeat;
  background-position: 12px center;
}

.search-box:focus {
  border-color: var(--primary);
  box-shadow: 0 0 8px rgba(34,211,238,.5);
}



  </style>
</head>
<body>
  <div class="card">
    <h2>Student Records</h2>
    

<div class="actions">
  <a href="<?=site_url('create')?>"> 
    <button class="btn btn-add">+ Add Student</button> 
  </a>

  <!-- Search bar -->
  <div class="search-container">
    <input type="text" id="searchInput" class="search-box" placeholder="🔍 Search students...">
  </div>
</div>


    <table id="studentTable">
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
      
      <?php foreach($students as $students): ?>
        <tr>
          <td><?=$students['id']; ?></td>
          <td><?=htmlspecialchars($students['first_name']); ?></td>
          <td><?=htmlspecialchars($students['last_name']); ?></td>
          <td><?=htmlspecialchars($students['email']); ?></td>
          <td>
            <a href="<?=site_url('/update/'.$students['id']); ?>" class="btn btn-edit">Edit</a>
            <a href="<?=site_url('/delete/'.$students['id']); ?>" class="btn btn-delete"
               onclick="return confirm('Are you sure you want to delete this record?');">
               Delete
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>

<div class="pagination">
    <?= isset($pagination_links) ? $pagination_links : '' ?>
  </div>


  <script>
let typingTimer;
document.getElementById("searchInput").addEventListener("keyup", function() {
  clearTimeout(typingTimer);
  let keyword = this.value;

  typingTimer = setTimeout(() => {
    fetch("<?= site_url('students/search') ?>?keyword=" + keyword)
      .then(res => res.text())
      .then(data => {
        // Replace table body with DB results
        document.querySelector("#studentTable tbody").innerHTML = data;
      });
  }, 300); // debounce 300ms to avoid too many requests
});
</script>

</body>
</html>