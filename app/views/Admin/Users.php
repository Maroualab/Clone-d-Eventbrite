<?php
include "layouts/header.php";
include "layouts/navbar.php";
include "layouts/sidebar.php";
?>

            <div class="table-data">
                <div class="order">
					<div class="head">
						<h3>Users</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Email</th>
								<th>Role</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>taybilatifa46@gmail.com</td>
								<td>organisateur</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table>
				</div>
            </div>
		</section>
<script>
    let active=document.getElementById("user");
    active.classList.add('active');
</script>
<?php
include "layouts/footer.php";
?>