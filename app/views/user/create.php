<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mindoro State University - Create User</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 font-sans">

<div class="max-w-lg mx-auto bg-white rounded-xl shadow-xl p-8 mt-12 border-t-4 border-green-700">
  
  <!-- Header Section -->
  <div class="text-center mb-6">
    <img src="<?=base_url();?>public/logo.png" alt="MSU Logo" class="mx-auto w-24 mb-3">
    <h1 class="text-3xl font-bold text-green-800">Create User</h1>
    <p class="text-gray-600 text-sm">Fill out the form below to add a new user</p>
  </div>

  <!-- Error Message -->
  <?php if(isset($error)): ?>
  <div class="bg-red-100 border-l-4 border-red-600 text-red-700 p-3 rounded mb-4">
    <?=$error;?>
  </div>
  <?php endif; ?>

  <!-- User Form -->
  <form action="<?=site_url('user/create');?>" method="post" class="space-y-5">
    <div>
      <label class="block text-green-700 font-semibold mb-1">Username:</label>
      <input type="text" name="username" placeholder="Enter username" required 
             class="w-full border border-green-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
    </div>

    <div>
      <label class="block text-green-700 font-semibold mb-1">Email:</label>
      <input type="email" name="email" placeholder="Enter email address" required 
             class="w-full border border-green-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
    </div>

    <div class="flex justify-center gap-4">
      <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded-lg shadow hover:bg-green-800 transition">
        Create User
      </button>
      <a href="<?=site_url('/');?>" 
         class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
        Cancel
      </a>
    </div>
  </form>
</div>

</body>
</html>
