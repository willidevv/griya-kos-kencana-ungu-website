<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua admin.
     */
    public function index()
    {
        $users = User::orderBy('role', 'asc')->orderBy('name', 'asc')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Menampilkan form tambah admin baru.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Menyimpan admin baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => 'required|in:admin,super_admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'is_active' => true, // Default aktif saat dibuat
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Akun admin baru berhasil dibuat!');
    }

    /**
     * Fungsi Baru: Aktifkan atau Nonaktifkan Admin
     */
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        
        // Proteksi: Jangan biarkan admin menonaktifkan diri sendiri
        if (auth()->id() == $user->id) {
            return back()->with('error', 'Gagal! Anda tidak bisa menonaktifkan akun Anda sendiri.');
        }

        // Balikkan status
        $user->is_active = !$user->is_active;
        $user->save();

        $statusText = $user->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Akun {$user->name} berhasil {$statusText}.");
    }

    /**
     * Menampilkan form edit admin.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Memperbarui data admin.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'role' => 'required|in:admin,super_admin',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Data admin berhasil diperbarui!');
    }

    /**
     * Menghapus admin.
     */
    public function destroy(User $user)
    {
        // Mencegah super admin menghapus dirinya sendiri
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Anda tidak bisa menghapus akun Anda sendiri!');
        }

        $user->delete();
        return back()->with('success', 'Akun admin telah dihapus.');
    }
}