import React, { useState } from 'react';
import { Moon, Sun, Bell, Globe, Lock, User, LogOut, HelpCircle, Database, ChevronRight, Trash2, UserX, ArrowLeft } from 'lucide-react';

export default function PengaturanDashboard() {
  const [darkMode, setDarkMode] = useState(false);
  const [notifications, setNotifications] = useState(true);
  const [showEditProfile, setShowEditProfile] = useState(false);

  if (showEditProfile) {
    return (
      <div className={`min-h-screen transition-colors duration-300 ${darkMode ? 'bg-gray-900' : 'bg-gradient-to-br from-cyan-50 to-blue-50'}`}>
        {/* Header */}
        <div className={`transition-colors duration-300 ${darkMode ? 'bg-gray-800 border-gray-700' : 'bg-white border-gray-200'} shadow-sm border-b`}>
          <div className="max-w-4xl mx-auto px-6 py-6">
            <button 
              onClick={() => setShowEditProfile(false)}
              className={`flex items-center gap-2 mb-4 transition-colors duration-300 ${darkMode ? 'text-cyan-400 hover:text-cyan-300' : 'text-cyan-600 hover:text-cyan-700'}`}
            >
              <ArrowLeft size={20} />
              <span>Kembali</span>
            </button>
            <h1 className={`text-3xl font-bold transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Edit Profil</h1>
            <p className={`text-sm mt-2 transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>
              Kelola informasi profil Anda
            </p>
          </div>
        </div>

        <div className="max-w-4xl mx-auto px-6 py-8">
          {/* Form Edit Profil */}
          <div className={`transition-colors duration-300 ${darkMode ? 'bg-gray-800' : 'bg-white'} rounded-xl shadow-sm mb-4 p-6`}>
            <div className="space-y-4">
              <div>
                <label className={`block text-sm font-medium mb-2 transition-colors duration-300 ${darkMode ? 'text-gray-300' : 'text-gray-700'}`}>Nama Lengkap</label>
                <input
                  type="text"
                  defaultValue="Administrator"
                  className={`w-full px-4 py-3 rounded-lg border transition-colors duration-300 ${darkMode ? 'bg-gray-700 border-gray-600 text-white' : 'bg-white border-gray-300 text-gray-800'} focus:ring-2 focus:ring-cyan-500 focus:border-transparent`}
                />
              </div>
              <div>
                <label className={`block text-sm font-medium mb-2 transition-colors duration-300 ${darkMode ? 'text-gray-300' : 'text-gray-700'}`}>Email</label>
                <input
                  type="email"
                  defaultValue="admin@riauport.com"
                  className={`w-full px-4 py-3 rounded-lg border transition-colors duration-300 ${darkMode ? 'bg-gray-700 border-gray-600 text-white' : 'bg-white border-gray-300 text-gray-800'} focus:ring-2 focus:ring-cyan-500 focus:border-transparent`}
                />
              </div>
              <div>
                <label className={`block text-sm font-medium mb-2 transition-colors duration-300 ${darkMode ? 'text-gray-300' : 'text-gray-700'}`}>Nomor Telepon</label>
                <input
                  type="tel"
                  defaultValue="+62 812 3456 7890"
                  className={`w-full px-4 py-3 rounded-lg border transition-colors duration-300 ${darkMode ? 'bg-gray-700 border-gray-600 text-white' : 'bg-white border-gray-300 text-gray-800'} focus:ring-2 focus:ring-cyan-500 focus:border-transparent`}
                />
              </div>
              <button className="w-full bg-cyan-600 hover:bg-cyan-700 text-white py-3 rounded-lg font-semibold transition-colors">
                Simpan Perubahan
              </button>
            </div>
          </div>

          {/* Pengaturan Akun */}
          <div className={`transition-colors duration-300 ${darkMode ? 'bg-gray-800' : 'bg-white'} rounded-xl shadow-sm mb-4 overflow-hidden`}>
            <div className={`px-6 py-4 transition-colors duration-300 ${darkMode ? 'border-gray-700' : 'border-gray-200'} border-b`}>
              <h2 className={`text-lg font-semibold transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Pengaturan Akun</h2>
            </div>
            
            <div className={`transition-colors duration-300 ${darkMode ? 'divide-gray-700' : 'divide-gray-200'} divide-y`}>
              {/* Nonaktifkan Akun */}
              <button className={`w-full px-6 py-4 flex items-center justify-between transition-colors duration-200 ${darkMode ? 'hover:bg-gray-700' : 'hover:bg-gray-50'}`}>
                <div className="flex items-center gap-4">
                  <div className={`p-2 transition-colors duration-300 ${darkMode ? 'bg-gray-700' : 'bg-yellow-100'} rounded-lg`}>
                    <UserX className={`transition-colors duration-300 ${darkMode ? 'text-yellow-400' : 'text-yellow-600'}`} size={20} />
                  </div>
                  <div className="text-left">
                    <p className={`font-medium transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Nonaktifkan Akun</p>
                    <p className={`text-sm transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>Nonaktifkan akun sementara</p>
                  </div>
                </div>
                <ChevronRight className={`transition-colors duration-300 ${darkMode ? 'text-gray-500' : 'text-gray-400'}`} size={20} />
              </button>

              {/* Hapus Akun */}
              <button className={`w-full px-6 py-4 flex items-center justify-between transition-colors duration-200 ${darkMode ? 'hover:bg-gray-700' : 'hover:bg-gray-50'}`}>
                <div className="flex items-center gap-4">
                  <div className={`p-2 transition-colors duration-300 ${darkMode ? 'bg-gray-700' : 'bg-red-100'} rounded-lg`}>
                    <Trash2 className={`transition-colors duration-300 ${darkMode ? 'text-red-400' : 'text-red-600'}`} size={20} />
                  </div>
                  <div className="text-left">
                    <p className={`font-medium transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Hapus Akun</p>
                    <p className={`text-sm transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>Hapus akun secara permanen</p>
                  </div>
                </div>
                <ChevronRight className={`transition-colors duration-300 ${darkMode ? 'text-gray-500' : 'text-gray-400'}`} size={20} />
              </button>
            </div>
          </div>
        </div>
      </div>
    );
  }

  return (
    <div className={`min-h-screen transition-colors duration-300 ${darkMode ? 'bg-gray-900' : 'bg-gradient-to-br from-cyan-50 to-blue-50'}`}>
      {/* Header */}
      <div className={`transition-colors duration-300 ${darkMode ? 'bg-gray-800 border-gray-700' : 'bg-white border-gray-200'} shadow-sm border-b`}>
        <div className="max-w-4xl mx-auto px-6 py-6">
          <h1 className={`text-3xl font-bold transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Pengaturan</h1>
          <p className={`text-sm mt-2 transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>
            Kelola preferensi dan pengaturan akun Anda
          </p>
        </div>
      </div>

      <div className="max-w-4xl mx-auto px-6 py-8">
        {/* Akun Section */}
        <div className={`transition-colors duration-300 ${darkMode ? 'bg-gray-800' : 'bg-white'} rounded-xl shadow-sm mb-4 overflow-hidden`}>
          <div className={`px-6 py-4 transition-colors duration-300 ${darkMode ? 'border-gray-700' : 'border-gray-200'} border-b`}>
            <h2 className={`text-lg font-semibold transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Akun</h2>
          </div>
          
          <div className={`transition-colors duration-300 ${darkMode ? 'divide-gray-700' : 'divide-gray-200'} divide-y`}>
            {/* Edit Profil */}
            <button 
              onClick={() => setShowEditProfile(true)}
              className={`w-full px-6 py-4 flex items-center justify-between transition-colors duration-200 ${darkMode ? 'hover:bg-gray-700' : 'hover:bg-gray-50'}`}
            >
              <div className="flex items-center gap-4">
                <div className={`p-2 transition-colors duration-300 ${darkMode ? 'bg-gray-700' : 'bg-cyan-100'} rounded-lg`}>
                  <User className={`transition-colors duration-300 ${darkMode ? 'text-cyan-400' : 'text-cyan-600'}`} size={20} />
                </div>
                <div className="text-left">
                  <p className={`font-medium transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Edit Profil</p>
                  <p className={`text-sm transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>Ubah nama, email, dan foto profil</p>
                </div>
              </div>
              <ChevronRight className={`transition-colors duration-300 ${darkMode ? 'text-gray-500' : 'text-gray-400'}`} size={20} />
            </button>

            {/* Ubah Password */}
            <button className={`w-full px-6 py-4 flex items-center justify-between transition-colors duration-200 ${darkMode ? 'hover:bg-gray-700' : 'hover:bg-gray-50'}`}>
              <div className="flex items-center gap-4">
                <div className={`p-2 transition-colors duration-300 ${darkMode ? 'bg-gray-700' : 'bg-cyan-100'} rounded-lg`}>
                  <Lock className={`transition-colors duration-300 ${darkMode ? 'text-cyan-400' : 'text-cyan-600'}`} size={20} />
                </div>
                <div className="text-left">
                  <p className={`font-medium transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Ubah Password</p>
                  <p className={`text-sm transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>Perbarui password akun Anda</p>
                </div>
              </div>
              <ChevronRight className={`transition-colors duration-300 ${darkMode ? 'text-gray-500' : 'text-gray-400'}`} size={20} />
            </button>
          </div>
        </div>

        {/* Tampilan Section */}
        <div className={`transition-colors duration-300 ${darkMode ? 'bg-gray-800' : 'bg-white'} rounded-xl shadow-sm mb-4 overflow-hidden`}>
          <div className={`px-6 py-4 transition-colors duration-300 ${darkMode ? 'border-gray-700' : 'border-gray-200'} border-b`}>
            <h2 className={`text-lg font-semibold transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Tampilan</h2>
          </div>
          
          <div className={`transition-colors duration-300 ${darkMode ? 'divide-gray-700' : 'divide-gray-200'} divide-y`}>
            {/* Tema Gelap */}
            <div className="px-6 py-5 flex items-center justify-between">
              <div className="flex items-center gap-4">
                <div className={`p-3 transition-all duration-300 ${darkMode ? 'bg-indigo-900' : 'bg-yellow-100'} rounded-xl`}>
                  {darkMode ? (
                    <Moon className="text-indigo-300 transition-all duration-300" size={24} />
                  ) : (
                    <Sun className="text-yellow-600 transition-all duration-300" size={24} />
                  )}
                </div>
                <div>
                  <p className={`font-semibold text-base transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Tema Gelap</p>
                  <p className={`text-sm transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>
                    {darkMode ? 'Mode gelap aktif' : 'Aktifkan mode gelap'}
                  </p>
                </div>
              </div>
              <label className="relative inline-flex items-center cursor-pointer">
                <input
                  type="checkbox"
                  checked={darkMode}
                  onChange={() => setDarkMode(!darkMode)}
                  className="sr-only peer"
                />
                <div className="relative w-16 h-8 bg-gray-300 peer-focus:ring-4 peer-focus:ring-cyan-300 rounded-full peer peer-checked:bg-cyan-600 transition-colors">
                  <div className={`absolute top-1 left-1 bg-white rounded-full h-6 w-6 shadow-md transition-transform duration-300 ${darkMode ? 'translate-x-8' : 'translate-x-0'}`}></div>
                </div>
              </label>
            </div>

            {/* Bahasa */}
            <button className={`w-full px-6 py-4 flex items-center justify-between transition-colors duration-200 ${darkMode ? 'hover:bg-gray-700' : 'hover:bg-gray-50'}`}>
              <div className="flex items-center gap-4">
                <div className={`p-2 transition-colors duration-300 ${darkMode ? 'bg-gray-700' : 'bg-cyan-100'} rounded-lg`}>
                  <Globe className={`transition-colors duration-300 ${darkMode ? 'text-cyan-400' : 'text-cyan-600'}`} size={20} />
                </div>
                <div className="text-left">
                  <p className={`font-medium transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Bahasa</p>
                  <p className={`text-sm transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>Bahasa Indonesia</p>
                </div>
              </div>
              <ChevronRight className={`transition-colors duration-300 ${darkMode ? 'text-gray-500' : 'text-gray-400'}`} size={20} />
            </button>
          </div>
        </div>

        {/* Notifikasi Section */}
        <div className={`transition-colors duration-300 ${darkMode ? 'bg-gray-800' : 'bg-white'} rounded-xl shadow-sm mb-4 overflow-hidden`}>
          <div className={`px-6 py-4 transition-colors duration-300 ${darkMode ? 'border-gray-700' : 'border-gray-200'} border-b`}>
            <h2 className={`text-lg font-semibold transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Notifikasi</h2>
          </div>
          
          <div className={`transition-colors duration-300 ${darkMode ? 'divide-gray-700' : 'divide-gray-200'} divide-y`}>
            {/* Push Notification */}
            <div className="px-6 py-5 flex items-center justify-between">
              <div className="flex items-center gap-4">
                <div className={`p-3 transition-colors duration-300 ${darkMode ? 'bg-gray-700' : 'bg-cyan-100'} rounded-xl`}>
                  <Bell className={`transition-colors duration-300 ${darkMode ? 'text-cyan-400' : 'text-cyan-600'}`} size={24} />
                </div>
                <div>
                  <p className={`font-semibold text-base transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Notifikasi Push</p>
                  <p className={`text-sm transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>
                    {notifications ? 'Notifikasi aktif' : 'Terima notifikasi real-time'}
                  </p>
                </div>
              </div>
              <label className="relative inline-flex items-center cursor-pointer">
                <input
                  type="checkbox"
                  checked={notifications}
                  onChange={() => setNotifications(!notifications)}
                  className="sr-only peer"
                />
                <div className="relative w-16 h-8 bg-gray-300 peer-focus:ring-4 peer-focus:ring-cyan-300 rounded-full peer peer-checked:bg-cyan-600 transition-colors">
                  <div className={`absolute top-1 left-1 bg-white rounded-full h-6 w-6 shadow-md transition-transform duration-300 ${notifications ? 'translate-x-8' : 'translate-x-0'}`}></div>
                </div>
              </label>
            </div>

            {/* Pengaturan Email */}
            <button className={`w-full px-6 py-4 flex items-center justify-between transition-colors duration-200 ${darkMode ? 'hover:bg-gray-700' : 'hover:bg-gray-50'}`}>
              <div className="flex items-center gap-4">
                <div className={`p-2 transition-colors duration-300 ${darkMode ? 'bg-gray-700' : 'bg-cyan-100'} rounded-lg`}>
                  <Bell className={`transition-colors duration-300 ${darkMode ? 'text-cyan-400' : 'text-cyan-600'}`} size={20} />
                </div>
                <div className="text-left">
                  <p className={`font-medium transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Notifikasi Email</p>
                  <p className={`text-sm transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>Atur notifikasi via email</p>
                </div>
              </div>
              <ChevronRight className={`transition-colors duration-300 ${darkMode ? 'text-gray-500' : 'text-gray-400'}`} size={20} />
            </button>
          </div>
        </div>

        {/* Keamanan & Privasi Section */}
        <div className={`transition-colors duration-300 ${darkMode ? 'bg-gray-800' : 'bg-white'} rounded-xl shadow-sm mb-4 overflow-hidden`}>
          <div className={`px-6 py-4 transition-colors duration-300 ${darkMode ? 'border-gray-700' : 'border-gray-200'} border-b`}>
            <h2 className={`text-lg font-semibold transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Keamanan & Privasi</h2>
          </div>
          
          <div className={`transition-colors duration-300 ${darkMode ? 'divide-gray-700' : 'divide-gray-200'} divide-y`}>
            {/* Privasi Data */}
            <button className={`w-full px-6 py-4 flex items-center justify-between transition-colors duration-200 ${darkMode ? 'hover:bg-gray-700' : 'hover:bg-gray-50'}`}>
              <div className="flex items-center gap-4">
                <div className={`p-2 transition-colors duration-300 ${darkMode ? 'bg-gray-700' : 'bg-cyan-100'} rounded-lg`}>
                  <Lock className={`transition-colors duration-300 ${darkMode ? 'text-cyan-400' : 'text-cyan-600'}`} size={20} />
                </div>
                <div className="text-left">
                  <p className={`font-medium transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Privasi Data</p>
                  <p className={`text-sm transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>Kelola data pribadi Anda</p>
                </div>
              </div>
              <ChevronRight className={`transition-colors duration-300 ${darkMode ? 'text-gray-500' : 'text-gray-400'}`} size={20} />
            </button>

            {/* Riwayat Login */}
            <button className={`w-full px-6 py-4 flex items-center justify-between transition-colors duration-200 ${darkMode ? 'hover:bg-gray-700' : 'hover:bg-gray-50'}`}>
              <div className="flex items-center gap-4">
                <div className={`p-2 transition-colors duration-300 ${darkMode ? 'bg-gray-700' : 'bg-cyan-100'} rounded-lg`}>
                  <Database className={`transition-colors duration-300 ${darkMode ? 'text-cyan-400' : 'text-cyan-600'}`} size={20} />
                </div>
                <div className="text-left">
                  <p className={`font-medium transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Riwayat Login</p>
                  <p className={`text-sm transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>Lihat aktivitas login</p>
                </div>
              </div>
              <ChevronRight className={`transition-colors duration-300 ${darkMode ? 'text-gray-500' : 'text-gray-400'}`} size={20} />
            </button>
          </div>
        </div>

        {/* Bantuan & Informasi Section */}
        <div className={`transition-colors duration-300 ${darkMode ? 'bg-gray-800' : 'bg-white'} rounded-xl shadow-sm mb-4 overflow-hidden`}>
          <div className={`px-6 py-4 transition-colors duration-300 ${darkMode ? 'border-gray-700' : 'border-gray-200'} border-b`}>
            <h2 className={`text-lg font-semibold transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Bantuan & Informasi</h2>
          </div>
          
          <div className={`transition-colors duration-300 ${darkMode ? 'divide-gray-700' : 'divide-gray-200'} divide-y`}>
            {/* Pusat Bantuan */}
            <button className={`w-full px-6 py-4 flex items-center justify-between transition-colors duration-200 ${darkMode ? 'hover:bg-gray-700' : 'hover:bg-gray-50'}`}>
              <div className="flex items-center gap-4">
                <div className={`p-2 transition-colors duration-300 ${darkMode ? 'bg-gray-700' : 'bg-cyan-100'} rounded-lg`}>
                  <HelpCircle className={`transition-colors duration-300 ${darkMode ? 'text-cyan-400' : 'text-cyan-600'}`} size={20} />
                </div>
                <div className="text-left">
                  <p className={`font-medium transition-colors duration-300 ${darkMode ? 'text-white' : 'text-gray-800'}`}>Pusat Bantuan</p>
                  <p className={`text-sm transition-colors duration-300 ${darkMode ? 'text-gray-400' : 'text-gray-600'}`}>FAQ dan panduan penggunaan</p>
                </div>
              </div>
              <ChevronRight className={`transition-colors duration-300 ${darkMode ? 'text-gray-500' : 'text-gray-400'}`} size={20} />
            </button>
          </div>
        </div>

        {/* Logout Button */}
        <button className={`w-full transition-colors duration-300 ${darkMode ? 'bg-red-900 hover:bg-red-800' : 'bg-red-600 hover:bg-red-700'} text-white rounded-xl shadow-sm py-4 flex items-center justify-center gap-3`}>
          <LogOut size={20} />
          <span className="font-semibold">Keluar dari Akun</span>
        </button>

        {/* Footer */}
        <div className="text-center mt-8">
          <p className={`text-sm transition-colors duration-300 ${darkMode ? 'text-gray-500' : 'text-gray-500'}`}>
            © 2025 RiauPort. All rights reserved.
          </p>
        </div>
      </div>
    </div>
  );
}