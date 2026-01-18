<?php
session_start();
include("../db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard | AI-Solutions</title>
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="dashboard-body">
  <!-- NAVBAR -->
  <nav class="dashboard-nav">
    <div class="nav-container">
      <div class="nav-logo">
        <div class="logo-icon"><i class="fas fa-brain"></i></div>
        <h2>AI-Solutions</h2>
      </div>

      <div class="user-profile" onclick="toggleProfileMenu()">
        <div class="avatar"><i class="fas fa-user"></i></div>
        <div class="user-info">
          <span class="user-name" id="userName">Admin</span>
          <span class="user-role" id="userRole">Super Admin</span>
        </div>
        <i class="fas fa-chevron-down dropdown-icon"></i>
      </div>

      <div id="profileMenu" class="profile-menu">
        <a href="#" onclick="showProfile()"><i class="fas fa-user-circle"></i> Profile</a>
        <hr />
        <a href="#" class="logout" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    </div>
  </nav>

  <div class="dashboard-layout">
    <!-- SIDEBAR -->
    <aside class="dashboard-sidebar">
      <div class="sidebar-content">
        <div class="sidebar-menu">
          <div class="menu-section">
            <h4>MAIN</h4>
            <a href="#" class="menu-item" onclick="showDashboard()"><i class="fas fa-home"></i> Overview</a>
            <a href="#" class="menu-item" onclick="showAnalytics()"><i class="fas fa-chart-line"></i> Analytics</a>
            <a href="#" class="menu-item" onclick="showProjects()"><i class="fas fa-folder-open"></i> Projects</a>
            <a href="#" class="menu-item" onclick="showContactMessages()"><i class="fas fa-envelope"></i> Contact Messages</a>
          </div>
        </div>
      </div>
    </aside>

    <!-- MAIN -->
    <main class="dashboard-main">
      <header class="dashboard-header">
        <div class="header-content">
          <div class="header-title">
            <h1 id="pageTitle">Dashboard Overview</h1>
            <p id="pageSubtitle">Welcome to your AI-Solutions control center</p>
          </div>
          <div class="header-actions">
            <button class="action-btn primary" onclick="quickExport()">
              <i class="fas fa-download"></i> Export
            </button>
          </div>
        </div>
      </header>

      <!-- CONTENT AREA (all sections live here; only one shown at a time) -->
      <div class="dashboard-content" id="dashboardContent">

        <!-- ===== Overview ===== -->
        <section id="overviewSection" class="content-section" style="display:block;">
          <div class="stats-grid">
            <div class="stat-card">
              <div class="stat-icon purple"><i class="fas fa-users"></i></div>
              <div class="stat-info">
                <h3>1,247</h3>
                <p>Active Users</p>
                <span class="stat-change positive">+12.5%</span>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon violet"><i class="fas fa-diagram-project"></i></div>
              <div class="stat-info">
                <h3>156</h3>
                <p>Active Projects</p>
                <span class="stat-change positive">+8.3%</span>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon pink"><i class="fas fa-robot"></i></div>
              <div class="stat-info">
                <h3>23</h3>
                <p>AI Models</p>
                <span class="stat-change neutral">0%</span>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon blue"><i class="fas fa-chart-line"></i></div>
              <div class="stat-info">
                <h3>94.7%</h3>
                <p>Success Rate</p>
                <span class="stat-change positive">+2.1%</span>
              </div>
            </div>
          </div>

          <div class="chart-area">
            <h3>Performance Overview</h3>
            <p>This section can display charts or summaries (Chart.js, etc.)</p>
          </div>
        </section>

        <!-- ===== Analytics ===== -->
        <section id="analyticsSection" class="content-section" style="display:none;">
          <div class="stats-grid">
            <div class="stat-card">
              <div class="stat-icon blue"><i class="fas fa-chart-bar"></i></div>
              <div class="stat-info">
                <h3>32,410</h3>
                <p>Sessions</p>
                <span class="stat-change positive">+4.2%</span>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon purple"><i class="fas fa-user-plus"></i></div>
              <div class="stat-info">
                <h3>1,108</h3>
                <p>New Users</p>
                <span class="stat-change positive">+1.8%</span>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon pink"><i class="fas fa-percent"></i></div>
              <div class="stat-info">
                <h3>3.4%</h3>
                <p>Conversion Rate</p>
                <span class="stat-change negative">-0.3%</span>
              </div>
            </div>
          </div>

          <div class="chart-area">
            <h3>Traffic & Engagement</h3>
            <p>Place your charts / KPIs here.</p>
          </div>
        </section>

        <!-- ===== Projects ===== -->
        <section id="projectsSection" class="content-section" style="display:none;">
          <div class="stats-grid">
            <div class="stat-card">
              <div class="stat-icon violet"><i class="fas fa-folder-open"></i></div>
              <div class="stat-info">
                <h3>156</h3>
                <p>Active Projects</p>
                <span class="stat-change positive">+8.3%</span>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon blue"><i class="fas fa-clock"></i></div>
              <div class="stat-info">
                <h3>28</h3>
                <p>In Review</p>
                <span class="stat-change neutral">–</span>
              </div>
            </div>
          </div>

          <div class="chart-area">
            <h3>Projects Overview</h3>
            <p>Add project list / kanban / timeline here.</p>
          </div>
        </section>

        <!-- ===== Contact Messages (PHP + DB) ===== -->
        <section id="contactMessages" class="content-section" style="display:none;">
          <div class="table-container">
            <div class="table-header">
              <h3>📩 Contact Messages</h3>
            </div>
            <div class="demo-table">
              <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Country</th>
                    <th>Job Title</th>
                    <th>Details</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $result = $conn->query("SELECT * FROM contact_messages ORDER BY created_at DESC");
                  if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>
                              <td>".htmlspecialchars($row['id'])."</td>
                              <td>".htmlspecialchars($row['name'])."</td>
                              <td>".htmlspecialchars($row['email'])."</td>
                              <td>".htmlspecialchars($row['phone'])."</td>
                              <td>".htmlspecialchars($row['company'])."</td>
                              <td>".htmlspecialchars($row['country'])."</td>
                              <td>".htmlspecialchars($row['title'])."</td>
                              <td>".nl2br(htmlspecialchars($row['details']))."</td>
                              <td>".htmlspecialchars($row['created_at'])."</td>
                            </tr>";
                    }
                  } else {
                    echo "<tr><td colspan='9'>No messages found.</td></tr>";
                  }
                  $conn->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>

      </div>
    </main>
  </div>

  <script src="../js/admin-dashboard.js"></script>
</body>
</html>
