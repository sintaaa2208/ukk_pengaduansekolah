<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center text-green-600">Registrasi Siswa</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium">Username</label>
                <input type="text" name="username" class="w-full border rounded p-2">
            </div>
             <div class="mb-6">
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">NIS (Sesuai Kartu Pelajar)</label>
                <input type="number" name="nis" class="w-full border rounded p-2">
            </div>
             <div class="mb-4">
                <label class="block text-sm font-medium">Kelas (Jurusan)</label>
                <input type="number text" name="Kelas" class="w-full border rounded p-2">
            </div>
    
            <button type="submit" class="w-full bg-green-600 text-white p-2 rounded hover:bg-green-700 transition">Daftar Sekarang</button>
            
        <form action="{{ route('logout') }}" method="POST">
    @csrf
   <button type="submit" class="btn-primary">logout</button>
</form>
    </div>
</body>
</html>