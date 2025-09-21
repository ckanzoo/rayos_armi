<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mindoro State University - User Management</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-900 via-green-700 to-green-600 font-sans min-h-screen relative overflow-x-hidden">

<!-- Enhanced Background Pattern -->
<div class="absolute inset-0">
  <!-- Academic Grid Pattern -->
  <div class="absolute inset-0 opacity-5">
    <div class="grid grid-cols-12 gap-4 h-full w-full p-4">
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
    </div>
  </div>
  
  <!-- Floating Academic Elements -->
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-20 left-10 w-20 h-20 border-2 border-green-300 rounded-full animate-spin-slow"></div>
    <div class="absolute top-40 right-20 w-16 h-16 bg-green-400 rotate-45 animate-pulse"></div>
    <div class="absolute bottom-32 left-16 w-24 h-24 border-2 border-green-200 rotate-12 animate-bounce-slow"></div>
    <div class="absolute bottom-20 right-32 w-18 h-18 bg-green-300 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
  </div>
  
  <!-- Subtle Dot Matrix -->
  <div class="absolute inset-0 opacity-8">
    <div class="grid grid-cols-20 gap-6 h-full w-full p-8">
      <div class="w-1 h-1 bg-green-200 rounded-full"></div>
      <div class="w-1 h-1 bg-green-300 rounded-full"></div>
      <div class="w-1 h-1 bg-green-200 rounded-full"></div>
    </div>
  </div>
</div>

<!-- Modern Glass Container -->
<div class="max-w-7xl mx-auto bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/30 p-8 mt-8 mx-4 relative z-10 overflow-hidden">

  <!-- Decorative Header Background -->
  <div class="absolute top-0 left-0 right-0 h-32 bg-gradient-to-r from-green-100/50 via-emerald-50/30 to-green-100/50 rounded-t-3xl"></div>

  <!-- Modern Header -->
  <div class="relative z-10 text-center border-b border-green-200/50 pb-8 mb-10">
    <div class="flex flex-col items-center space-y-4">
      <!-- Enhanced Logo Container -->
      <div class="relative">
        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-green-600 rounded-full blur-lg opacity-30 animate-pulse"></div>
        <div class="relative bg-white p-2 rounded-full shadow-2xl border-4 border-green-100">
          <img src="/public/logo.png" 
               alt="Mindoro State University" 
               class="w-24 h-24 object-contain rounded-full">
        </div>
      </div>
      
      <!-- Modern Typography -->
      <div class="text-center space-y-2">
        <h1 class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-green-800 via-green-700 to-green-600 tracking-tight">
          User Management
        </h1>
        <div class="text-xl font-semibold text-green-700">Dashboard</div>
        <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-green-600 mx-auto rounded-full"></div>
      </div>
    </div>
  </div>

  <!-- Modern Controls Section -->
  <div class="bg-gradient-to-r from-slate-50/80 to-green-50/80 backdrop-blur-sm rounded-2xl border border-green-100/50 p-8 mb-10 shadow-lg">
    <div class="flex flex-col lg:flex-row justify-between items-stretch gap-6">
      
      <!-- Enhanced Search -->
      <div class="flex-1 max-w-2xl">
        <form action="/" method="get" class="relative group">
          <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-emerald-400 rounded-2xl blur opacity-25 group-hover:opacity-40 transition duration-300"></div>
          <div class="relative flex bg-white rounded-2xl shadow-xl border border-green-200/50 overflow-hidden">
            <div class="flex items-center pl-6 text-green-500">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"></path>
              </svg>
            </div>
            <input type="text" name="q" placeholder="Search students, faculty, or staff..." 
                   value="<?= html_escape($q ?? '') ?>"
                   class="flex-1 px-4 py-4 text-gray-700 placeholder-gray-400 focus:outline-none text-lg">
            <button type="submit" 
                    class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-4 font-bold hover:from-green-700 hover:to-green-800 transition-all duration-300 relative overflow-hidden group">
              <span class="relative z-10">Search</span>
              <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
            </button>
          </div>
        </form>
      </div>
      
      <!-- Enhanced Add Button -->
      <div class="flex-shrink-0">
        <a href="<?= site_url('user/create'); ?>"
           class="group relative bg-gradient-to-r from-green-600 via-green-700 to-green-800 text-white px-8 py-4 rounded-2xl font-bold shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 flex items-center gap-3 whitespace-nowrap overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
          <svg class="w-6 h-6 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg>
          <span class="relative z-10 text-lg">Add New User</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Modern Table Container -->
  <div class="bg-white/70 backdrop-blur-sm rounded-3xl shadow-2xl border border-green-100/50 overflow-hidden">
    
    <!-- Table Header Enhancement -->
    <div class="bg-gradient-to-r from-green-700 via-green-600 to-green-700 text-white relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
      <div class="relative z-10 px-8 py-6">
        <h2 class="text-2xl font-bold flex items-center gap-3">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
          </svg>
          User Directory
        </h2>
      </div>
    </div>

    <!-- Enhanced Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full">
        <thead class="bg-gradient-to-r from-green-50 to-emerald-50">
          <tr>
            <th class="px-8 py-5 text-left text-sm font-black uppercase tracking-wider text-green-800 border-b border-green-200">
              <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                ID
              </div>
            </th>
            <th class="px-8 py-5 text-left text-sm font-black uppercase tracking-wider text-green-800 border-b border-green-200">
              <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0ZM12 14a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7Z"></path>
                </svg>
                Username
              </div>
            </th>
            <th class="px-8 py-5 text-left text-sm font-black uppercase tracking-wider text-green-800 border-b border-green-200">
              <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 1 0-8 0 4 4 0 0 0 8 0Zm0 0v1.5a2.5 2.5 0 0 0 5 0V12a9 9 0 1 0-5.999 8.437"></path>
                </svg>
                Email
              </div>
            </th>
            <th class="px-8 py-5 text-center text-sm font-black uppercase tracking-wider text-green-800 border-b border-green-200">
              <div class="flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065Z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                </svg>
                Actions
              </div>
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-green-100">
          <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
            <tr class="group hover:bg-gradient-to-r hover:from-green-50/50 hover:to-emerald-50/50 transition-all duration-300">
              <td class="px-8 py-6 font-bold text-green-800 group-hover:text-green-900">
                <div class="flex items-center gap-3">
                  <div class="w-3 h-3 bg-green-400 rounded-full group-hover:bg-green-500 transition-colors"></div>
                  <span class="text-lg"><?=$user['id'];?></span>
                </div>
              </td>
              <td class="px-8 py-6">
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                    <?= strtoupper(substr($user['username'], 0, 2)); ?>
                  </div>
                  <div>
                    <div class="font-bold text-gray-900 text-lg"><?=$user['username'];?></div>
                    <div class="text-sm text-green-600 font-medium">Active User</div>
                  </div>
                </div>
              </td>
              <td class="px-8 py-6">
                <div class="text-gray-700 font-medium text-lg"><?=$user['email'];?></div>
                <div class="text-sm text-gray-500">Primary Contact</div>
              </td>
              <td class="px-8 py-6">
                <div class="flex justify-center gap-3">
                  <a href="<?=site_url('user/update/'.$user['id']);?>"
                     class="group relative bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                    <span class="relative z-10 flex items-center gap-2">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path>
                      </svg>
                      Edit
                    </span>
                  </a>
                  <a href="<?=site_url('user/delete/'.$user['id']);?>"
                     onclick="return confirm('Are you sure you want to delete this user?');"
                     class="group relative bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                    <span class="relative z-10 flex items-center gap-2">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"></path>
                      </svg>
                      Delete
                    </span>
                  </a>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="4" class="text-center px-8 py-20">
                <div class="text-gray-400">
                  <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                    </svg>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-500 mb-4">No users found</h3>
                  <p class="text-gray-400 text-lg mb-8">Start building your academic community by adding your first user.</p>
                  <a href="<?= site_url('user/create'); ?>" 
                     class="bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 inline-flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add First User
                  </a>
                </div>
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modern Pagination -->
  <div class="mt-10 bg-gradient-to-r from-green-50/50 to-emerald-50/50 backdrop-blur-sm rounded-2xl border border-green-100/50 p-8">
    <div class="pagination-container text-center">
      <?= $page ?? ''; ?>
    </div>
  </div>

</div>

<style>
/* Modern Pagination Styling */
.pagination-container a, .pagination-container span {
  @apply inline-flex items-center justify-center px-6 py-3 mx-2 rounded-xl font-bold transition-all duration-300 border-2;
}

.pagination-container a {
  @apply bg-white text-green-700 border-green-200 hover:bg-green-600 hover:text-white hover:border-green-600 shadow-lg hover:shadow-xl transform hover:scale-105;
}

.pagination-container .current {
  @apply bg-gradient-to-r from-green-600 to-green-700 text-white border-green-600 shadow-xl scale-105;
}

.pagination-container .disabled {
  @apply bg-gray-100 text-gray-400 border-gray-200 cursor-not-allowed;
}

/* Enhanced Custom Animations */
@keyframes spin-slow {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

@keyframes bounce-slow {
  0%, 100% { transform: translateY(0) rotate(12deg); }
  50% { transform: translateY(-20px) rotate(12deg); }
}

.animate-spin-slow {
  animation: spin-slow 12s linear infinite;
}

.animate-bounce-slow {
  animation: bounce-slow 4s ease-in-out infinite;
}

/* Glassmorphism enhancements */
@supports (backdrop-filter: blur(10px)) {
  .backdrop-blur-xl {
    backdrop-filter: blur(16px);
  }
}
</style>

</body>
</html>