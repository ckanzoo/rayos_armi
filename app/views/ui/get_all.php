<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Students Management - Mindoro State University</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  * { font-family: 'Inter', sans-serif; }
  
  .glass-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
  }
  
  .btn-primary {
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3);
  }
  
  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(5, 150, 105, 0.4);
  }
  
  .table-row {
    transition: all 0.2s ease;
    border-bottom: 1px solid rgba(229, 231, 235, 0.5);
  }
  
  .table-row:hover {
    background: rgba(16, 185, 129, 0.05);
    transform: translateX(4px);
  }
  
  .search-input {
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }
  
  .search-input:focus {
    box-shadow: 0 4px 20px rgba(5, 150, 105, 0.2);
  }
  
  .floating-bg {
    position: absolute;
    background: linear-gradient(45deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.05));
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
  }
  
  @keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
  }
  
  .card-hover {
    transition: all 0.3s ease;
  }
  
  .card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  }

  /* Custom Pagination Styles */
  .pagination-container {
  display: flex;
  gap: 0.5rem;
  align-items: center;
  justify-content: center;
}

.pagination-container ul {
  display: flex;
  gap: 0.5rem;
  padding: 0;
  margin: 0;
  list-style: none;
}

.pagination-container li {
  display: inline-flex;
}

.pagination-container a,
.pagination-container span {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 2.5rem;
  height: 2.5rem;
  padding: 0 0.75rem;
  border: 1px solid #d1d5db;
  background: white;
  color: #374151;
  font-weight: 500;
  font-size: 0.875rem;
  border-radius: 0.5rem;
  transition: all 0.2s ease;
  text-decoration: none;
}

.pagination-container a:hover:not(.disabled) {
  background: #f3f4f6;
  border-color: #9ca3af;
}

.pagination-container .active {
  background: #059669 !important;
  color: white !important;
  border-color: #059669 !important;
}

.pagination-container .disabled {
  opacity: 0.5;
  cursor: not-allowed;
  pointer-events: none;
}

.pagination-container svg {
  width: 1rem;
  height: 1rem;
}
</style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-green-50 to-emerald-50 min-h-screen relative overflow-x-hidden">

<!-- Subtle Background Elements -->
<div class="absolute inset-0 overflow-hidden">
  <div class="floating-bg w-72 h-72 -top-36 -left-36" style="animation-delay: 0s;"></div>
  <div class="floating-bg w-96 h-96 -bottom-48 -right-48" style="animation-delay: 2s;"></div>
  <div class="floating-bg w-48 h-48 top-1/3 -right-24" style="animation-delay: 4s;"></div>
</div>

<div class="relative z-10 py-8 px-4">
  <div class="max-w-7xl mx-auto">
    
    <!-- Header Section -->
    <div class="glass-card rounded-2xl shadow-xl mb-8 p-8 card-hover">
      <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
        <div class="flex items-center gap-6">
          <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-green-600 rounded-2xl blur opacity-30"></div>
            <div class="relative bg-white p-3 rounded-2xl shadow-lg border border-green-100">
              <img src="/public/logo.png" alt="MSU Logo" class="w-16 h-16 object-contain">
            </div>
          </div>
          <div>
            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">
              Student Management
            </h1>
            <p class="text-lg text-gray-600 font-medium">Mindoro State University</p>
            <div class="w-20 h-1 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full mt-3"></div>
          </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-3">
          <a href="/students/create" class="btn-primary px-6 py-3 text-white rounded-xl font-semibold flex items-center gap-2 text-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Add Student
          </a>
          <a href="/auth/logout" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition flex items-center gap-2 text-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            Logout
          </a>
        </div>
      </div>
    </div>

    <!-- Controls Section -->
    <div class="glass-card rounded-2xl shadow-xl mb-8 p-6 card-hover">
      <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
        
        <!-- View Toggle -->
        <div class="flex items-center gap-4">
          <span class="text-sm font-medium text-gray-700">View:</span>
          <?php if (!empty($show_deleted)): ?>
            <a href="/students/get-all" class="px-4 py-2 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition font-medium flex items-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
              Active Students
            </a>
          <?php else: ?>
            <a href="/students/get-all?show=deleted" class="px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition font-medium flex items-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
              </svg>
              Deleted Students
            </a>
          <?php endif; ?>
        </div>

        <!-- Search Form -->
        <form method="get" action="/students/get-all" class="flex gap-3 w-full max-w-md">
          <input type="hidden" name="show" value="<?= $show_deleted ? 'deleted' : 'active' ?>">
          <div class="relative flex-1">
            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" name="search" placeholder="Search students..." 
                   value="<?= htmlspecialchars($search ?? '') ?>"
                   class="search-input w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white">
          </div>
          <button type="submit" class="btn-primary px-6 py-3 text-white rounded-xl font-semibold">
            Search
          </button>
        </form>
      </div>
    </div>

    <!-- Table Section -->
    <div class="glass-card rounded-2xl shadow-xl overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="bg-gradient-to-r from-green-600 to-emerald-700 text-white">
              <th class="py-4 px-6 text-left font-semibold">#</th>
              <th class="py-4 px-6 text-left font-semibold">Photo</th>
              <th class="py-4 px-6 text-left font-semibold">Student Name</th>
              <th class="py-4 px-6 text-left font-semibold">Email Address</th>
              <th class="py-4 px-6 text-center font-semibold">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            <?php $counter = ($page - 1) * $per_page + 1; ?>
            <?php if (!empty($records)): ?>
              <?php foreach ($records as $r): ?>
                <tr class="table-row">
                 <td class="py-4 px-6 font-medium text-gray-900"><?= $r['id'] ?></td>
                  <td class="py-4 px-6">
                    <div class="flex items-center">
                      <?php if (!empty($r['photo'])): ?>
                        <img src="<?= $upload_url . htmlspecialchars($r['photo']) ?>" 
                             class="w-12 h-12 rounded-full object-cover border-2 border-green-200 shadow-sm">
                      <?php else: ?>
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
                          <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                          </svg>
                        </div>
                      <?php endif; ?>
                    </div>
                  </td>
                  <td class="py-4 px-6">
                    <div class="font-semibold text-gray-900">
                      <?= htmlspecialchars($r['first_name'] . ' ' . $r['last_name']) ?>
                    </div>
                  </td>
                  <td class="py-4 px-6 text-gray-600">
                    <?= htmlspecialchars($r['email']) ?>
                  </td>
                  <td class="py-4 px-6">
                    <div class="flex justify-center gap-2">
                      <?php if (empty($show_deleted)): ?>
                        <a href="/students/update/<?= $r['id'] ?>" 
                           class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition text-sm font-medium flex items-center gap-1">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                          </svg>
                          Edit
                        </a>
                        <a href="/students/delete/<?= $r['id'] ?>" 
                           onclick="return confirm('Are you sure you want to delete this student?')"
                           class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition text-sm font-medium flex items-center gap-1">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                          </svg>
                          Delete
                        </a>
                      <?php else: ?>
                        <a href="/students/restore/<?= $r['id'] ?>" 
                           class="px-3 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition text-sm font-medium flex items-center gap-1">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                          </svg>
                          Restore
                        </a>
                        <a href="/students/hard_delete/<?= $r['id'] ?>" 
                           onclick="return confirm('This will permanently delete the student. Are you sure?')"
                           class="px-3 py-2 bg-red-700 text-white rounded-lg hover:bg-red-800 transition text-sm font-medium flex items-center gap-1">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                          </svg>
                          Delete Forever
                        </a>
                      <?php endif; ?>
                    </div>
                  </td>
                </tr>
                <?php $counter++; ?>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="py-12 text-center">
                  <div class="flex flex-col items-center gap-4">
                    <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                    <div class="text-gray-500">
                      <p class="text-lg font-medium">No students found</p>
                      <p class="text-sm">Try adjusting your search criteria</p>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      
      <!-- Pagination -->
      <?php if (!empty($pagination_links)): ?>
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
          <div class="pagination-container text-center">
            <?= $pagination_links ?>
          </div>
        </div>
      <?php endif; ?>
    </div>

  </div>
</div>

</body>
</html>
