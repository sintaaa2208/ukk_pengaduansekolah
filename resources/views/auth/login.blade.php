<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Pengaduan Sarana Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Silahkan login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium">Username</label>
                <input type="text" name="username" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700 transition">Masuk</button>
        </form>
        <p class="mt-4 text-sm text-center">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 underline">Daftar Siswa</a>
        </p>
    </div>
</body>
</html>