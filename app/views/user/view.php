<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mindoro State University - View Users</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 font-sans">

<div class="max-w-5xl mx-auto bg-white rounded-xl shadow-xl p-8 mt-10">

  <!-- Header Section -->
  <div class="text-center border-b-4 border-green-700 pb-5 mb-6">
    <img src="<?=base_url();?>public/logo.png" alt="MSU Logo" class="mx-auto w-28 mb-3">
    <h1 class="text-3xl font-extrabold text-green-800">Mindoro State University</h1>
    <p class="text-gray-600 text-lg">User Management Dashboard</p>
  </div>

  <!-- Controls -->
  <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <input id="search" type="text" placeholder="Search users..." onkeyup="searchTable()"
           class="border border-green-700 rounded-lg px-4 py-2 w-full md:w-1/2 focus:outline-none focus:ring-2 focus:ring-green-500">
    <a href="<?=site_url('user/create');?>"
       class="bg-green-700 text-white px-5 py-2 rounded-lg hover:bg-green-800 font-semibold shadow-md transition">
      + Add User
    </a>
  </div>

  <!-- Users Table -->
  <div class="overflow-x-auto rounded-lg border border-green-100 shadow-md">
    <table id="users-table" class="min-w-full bg-white rounded-lg">
      <thead class="bg-green-700 text-white uppercase text-left text-sm">
        <tr>
          <th class="px-6 py-3">ID</th>
          <th class="px-6 py-3">Username</th>
          <th class="px-6 py-3">Email</th>
          <th class="px-6 py-3 text-center">Action</th>
        </tr>
      </thead>
      <tbody class="text-gray-700 divide-y divide-green-100">
        <?php foreach ($users as $user): ?>
        <tr class="hover:bg-green-50 transition">
          <td class="px-6 py-3 font-medium"><?=$user['id'];?></td>
          <td class="px-6 py-3"><?=$user['username'];?></td>
          <td class="px-6 py-3"><?=$user['email'];?></td>
          <td class="px-6 py-3 text-center flex justify-center gap-3">
            <a href="<?=site_url('user/update/'.$user['id']);?>"
               class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 shadow-sm transition">
              Edit
            </a>
            <a href="<?=site_url('user/delete/'.$user['id']);?>"
               onclick="return confirm('Are you sure you want to delete this user?');"
               class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 shadow-sm transition">
              Delete
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Pagination -->
<div class="flex justify-center mt-8">
  <nav class="inline-flex rounded-full shadow-md overflow-hidden border border-green-300 pagination-container">
    <?php if (isset($page)) echo $page; ?>
  </nav>
</div>







<script>
function searchTable() {
  const input = document.getElementById("search").value.toLowerCase();
  const table = document.getElementById("users-table");
  const trs = table.getElementsByTagName("tr");
  for (let i = 1; i < trs.length; i++) {
    const tds = trs[i].getElementsByTagName("td");
    let show = false;
    for (let j = 0; j < tds.length; j++) {
      if (tds[j].innerText.toLowerCase().includes(input)) {
        show = true;
        break;
      }
    }
    trs[i].style.display = show ? "" : "none";
  }
}
</script>
</body>
</html>
