<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Student</title>
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
      width:min(500px,95vw);
      background:linear-gradient(180deg,var(--panel),#0c1328);
      border:1px solid rgba(255,255,255,.06);
      border-radius:var(--radius);
      box-shadow:var(--shadow);
      padding:24px;
    }
    h2 {
      margin:0 0 20px;
      font-size:clamp(35px,3vw,26px);
      text-align:center;
      color:var(--primary);
    }
    form {
      display:grid;
      gap:16px;
    }
    label {
      font-size:15px;
      color:var(--text-dim);
    }
    input[type="text"],
    input[type="email"] {
      width:100%;
      padding:12px;
      border-radius:10px;
      border:1px solid var(--muted-2);
      background:var(--muted);
      color:var(--text);
      font-size:15px;
    }
    input:focus {
      outline:2px solid var(--primary);
      border-color:var(--primary-2);
    }
    .actions {
      text-align:center;
      margin-top:10px;
    }
    .btn {
      padding:10px 16px;
      border:none;
      border-radius:12px;
      cursor:pointer;
      font-size:14px;
      font-weight:600;
      transition:transform .2s, opacity .2s;
    }
    .btn:hover { transform:translateY(-2px); }
    .btn-submit { 
      background:linear-gradient(180deg,var(--primary),var(--primary-2)); 
      color:#06222a;
      width:100%;
    }
    .back-link {
  display: inline-block;
  margin-top: 12px;
  color: #fff;             /* plain white */
  text-decoration: none;
  font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>Add Student</h2>
    <form action="<?=site_url('/create');?>" method="POST">
      <div>
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
      </div>
      <div>
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
      </div>
      <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="you@example.com" required>
      </div>

      <div class="actions">
        <button type="submit" class="btn btn-submit">Save</button>
        <a class="back-link" href="get_all">Back to Students </a>
      </div>
    </form>
  </div>
</body>
</html>
