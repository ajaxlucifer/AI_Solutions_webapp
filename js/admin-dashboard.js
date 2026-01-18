// Admin Dashboard JavaScript
// Handles dashboard functionality, navigation, and demo features

document.addEventListener("DOMContentLoaded", function () {
  initDashboard();
});

function initDashboard() {
  checkAuthentication();
  loadUserProfile();
  initializeCharts();
  setupEventListeners();
}

function checkAuthentication() {
  const sessionData =
    localStorage.getItem("adminSession") ||
    sessionStorage.getItem("adminSession");

  if (!sessionData) {
    window.location.href = "admin-login.php";
    return;
  }

  try {
    const session = JSON.parse(sessionData);
    const loginTime = new Date(session.loginTime);
    const now = new Date();
    const hoursSinceLogin = (now - loginTime) / (1000 * 60 * 60);

    // Check session expiration
    const maxHours = localStorage.getItem("adminSession") ? 24 : 8;

    if (hoursSinceLogin >= maxHours) {
      logout();
      return;
    }

    // Update user info in the interface
    updateUserInterface(session);
  } catch (e) {
    logout();
  }
}

function loadUserProfile() {
  const sessionData =
    localStorage.getItem("adminSession") ||
    sessionStorage.getItem("adminSession");
  if (sessionData) {
    const session = JSON.parse(sessionData);
    document.getElementById("userName").textContent =
      session.username.charAt(0).toUpperCase() + session.username.slice(1);
    document.getElementById("userRole").textContent = session.role;
  }
}

function updateUserInterface(session) {
  // Update navigation based on permissions
  const menuItems = document.querySelectorAll(".menu-item");

  // Hide certain menu items based on role
  if (session.role !== "Super Admin") {
    menuItems.forEach((item) => {
      const text = item.textContent.trim();
      if (text === "Settings" || text === "Logs") {
        item.style.display = "none";
      }
    });
  }
}

function setupEventListeners() {
  // Menu item clicks
  const menuItems = document.querySelectorAll(".menu-item");
  menuItems.forEach((item) => {
    item.addEventListener("click", function (e) {
      e.preventDefault();

      // Remove active class from all items
      menuItems.forEach((mi) => mi.classList.remove("active"));

      // Add active class to clicked item
      this.classList.add("active");
    });
  });

  // Close notifications when clicking outside
  document.addEventListener("click", function (e) {
    const notificationPanel = document.getElementById("notificationPanel");
    const notificationBtn = document
      .querySelector(".action-btn i.fa-bell")
      .closest(".action-btn");

    if (
      !notificationPanel.contains(e.target) &&
      !notificationBtn.contains(e.target)
    ) {
      notificationPanel.classList.remove("show");
    }
  });
}

function toggleProfileMenu() {
  const profileMenu = document.getElementById("profileMenu");
  const userProfile = document.querySelector(".user-profile");

  profileMenu.classList.toggle("show");
  userProfile.classList.toggle("active");
}

// === Canonical section switcher ===
function showSection(id) {
  document.querySelectorAll(".content-section").forEach(sec => (sec.style.display = "none"));
  const target = document.getElementById(id);
  if (target) target.style.display = "block";
}

// === Page title helper ===
function updatePageTitle(title, subtitle) {
  document.getElementById("pageTitle").textContent = title;
  document.getElementById("pageSubtitle").textContent = subtitle;
}

// === Sidebar actions (one per section) ===
function showDashboard() {
  updatePageTitle("Dashboard Overview", "Welcome to your AI-Solutions control center");
  showSection("overviewSection");
}

function showAnalytics() {
  updatePageTitle("Analytics", "Detailed performance metrics and insights");
  showSection("analyticsSection");
}

function showProjects() {
  updatePageTitle("Projects", "View and manage active projects");
  showSection("projectsSection");
}

function showContactMessages() {
  updatePageTitle("Contact Messages", "Messages received from Contact Form");
  showSection("contactMessages");
}

// (Optional) On load, show dashboard
document.addEventListener("DOMContentLoaded", showDashboard);



function generateDemoContent(type) {
  switch (type) {
    case "analytics":
      return `
                <div class="content-section">
                    <div class="analytics-grid">
                        <div class="chart-card">
                            <div class="chart-header">
                                <h3>User Growth</h3>
                            </div>
                            <div class="chart-content">
                                <p>Interactive charts would be displayed here with real user growth data.</p>
                            </div>
                        </div>
                        <div class="chart-card">
                            <div class="chart-header">
                                <h3>Performance Metrics</h3>
                            </div>
                            <div class="chart-content">
                                <p>Detailed performance analytics and KPI tracking.</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;

    case "users":
      return `
                <div class="content-section">
                    <div class="table-container">
                        <div class="table-header">
                            <h3>Users</h3>
                            <button class="action-btn primary" onclick="createUser()">
                                <i class="fas fa-plus"></i> Add User
                            </button>
                        </div>
                        <div class="demo-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Smith</td>
                                        <td>john@example.com</td>
                                        <td>Developer</td>
                                        <td><span class="status active">Active</span></td>
                                        <td>
                                            <button class="btn-small">Edit</button>
                                            <button class="btn-small danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sarah Johnson</td>
                                        <td>sarah@example.com</td>
                                        <td>Manager</td>
                                        <td><span class="status active">Active</span></td>
                                        <td>
                                            <button class="btn-small">Edit</button>
                                            <button class="btn-small danger">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            `;

    case "projects":
      return `
                <div class="content-section">
                    <div class="projects-grid">
                        <div class="project-card">
                            <div class="project-header">
                                <h4>Customer Analytics AI</h4>
                                <span class="project-status in-progress">In Progress</span>
                            </div>
                            <p>Advanced analytics for customer behavior prediction</p>
                            <div class="project-progress">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 75%"></div>
                                </div>
                                <span>75% Complete</span>
                            </div>
                        </div>
                        <div class="project-card">
                            <div class="project-header">
                                <h4>Sentiment Analysis Tool</h4>
                                <span class="project-status completed">Completed</span>
                            </div>
                            <p>Real-time sentiment analysis for social media</p>
                            <div class="project-progress">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 100%"></div>
                                </div>
                                <span>100% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;

    default:
      return `
                <div class="content-section">
                    <div class="demo-content">
                        <h3>${
                          type.charAt(0).toUpperCase() + type.slice(1)
                        } Section</h3>
                        <p>This is a demo section for ${type}. In a real application, this would contain the actual ${type} management interface.</p>
                        <div class="demo-features">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Feature 1: Advanced ${type} management</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Feature 2: Real-time monitoring</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Feature 3: Detailed reporting</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
  }
}

// Action Functions
function showNotifications() {
  const notificationPanel = document.getElementById("notificationPanel");
  notificationPanel.classList.toggle("show");
}

function closeNotifications() {
  const notificationPanel = document.getElementById("notificationPanel");
  notificationPanel.classList.remove("show");
}

function quickExport() {
  const loadingOverlay = document.getElementById("loadingOverlay");
  loadingOverlay.classList.add("show");

  setTimeout(() => {
    loadingOverlay.classList.remove("show");
    showAlert("Export completed successfully!", "success");
  }, 2000);
}

function createNew() {
  showAlert("Create new dialog would open here", "info");
}

function createUser() {
  showAlert("Add user dialog would open here", "info");
}

function logout() {
  localStorage.removeItem("adminSession");
  sessionStorage.removeItem("adminSession");
  window.location.href = "admin-login.php";
}

// Chart initialization (placeholder)
function initializeCharts() {
  // In a real application, you would initialize actual charts here
  // Using libraries like Chart.js, D3.js, etc.
  console.log("Charts would be initialized here");
}

// Alert system (reuse from login)
function showAlert(message, type = "info") {
  // Create alert container if it doesn't exist
  let alertContainer = document.getElementById("alertContainer");
  if (!alertContainer) {
    alertContainer = document.createElement("div");
    alertContainer.id = "alertContainer";
    alertContainer.className = "alert-container";
    document.body.appendChild(alertContainer);
  }

  const alert = document.createElement("div");
  alert.className = `alert ${type}`;

  const icon = getAlertIcon(type);
  alert.innerHTML = `
        <i class="${icon}"></i>
        <span>${message}</span>
        <button class="alert-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;

  alertContainer.appendChild(alert);

  // Trigger animation
  setTimeout(() => alert.classList.add("show"), 100);

  // Auto remove after 5 seconds
  setTimeout(() => {
    if (alert.parentElement) {
      alert.classList.remove("show");
      setTimeout(() => alert.remove(), 400);
    }
  }, 5000);
}

function getAlertIcon(type) {
  switch (type) {
    case "success":
      return "fas fa-check-circle";
    case "error":
      return "fas fa-exclamation-circle";
    case "warning":
      return "fas fa-exclamation-triangle";
    default:
      return "fas fa-info-circle";
  }
}

// Close profile menu when clicking outside
document.addEventListener("click", function (e) {
  const userProfile = document.querySelector(".user-profile");
  const profileMenu = document.getElementById("profileMenu");

  if (!userProfile.contains(e.target)) {
    profileMenu.classList.remove("show");
    userProfile.classList.remove("active");
  }
});

// Add demo table styles
const style = document.createElement("style");
style.textContent = `
    .table-container {
        background: white;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        overflow: hidden;
    }
    
    .table-header {
        padding: 1.5rem;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .demo-table table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .demo-table th,
    .demo-table td {
        padding: 1rem 1.5rem;
        text-align: left;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .demo-table th {
        background: #f8fafc;
        font-weight: 600;
        color: #374151;
    }
    
    .status {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .status.active {
        background: #dcfce7;
        color: #16a34a;
    }
    
    .btn-small {
        padding: 0.25rem 0.75rem;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        background: white;
        color: #64748b;
        cursor: pointer;
        margin-right: 0.5rem;
        font-size: 0.85rem;
    }
    
    .btn-small.danger {
        border-color: #fecaca;
        color: #dc2626;
        background: #fef2f2;
    }
    
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 1.5rem;
    }
    
    .project-card {
        background: white;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 2rem;
    }
    
    .project-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .project-status {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .project-status.in-progress {
        background: #fef3c7;
        color: #d97706;
    }
    
    .project-status.completed {
        background: #dcfce7;
        color: #16a34a;
    }
    
    .project-progress {
        margin-top: 1.5rem;
    }
    
    .progress-bar {
        width: 100%;
        height: 8px;
        background: #f1f5f9;
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 0.5rem;
    }
    
    .progress-fill {
        height: 100%;
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border-radius: 4px;
    }
    
    .demo-content {
        background: white;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 2rem;
    }
    
    .demo-features {
        margin-top: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .feature-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: #64748b;
    }
    
    .feature-item i {
        color: #10b981;
    }
`;
document.head.appendChild(style);

function showContactMessages() {
  updatePageTitle("Contact Messages", "Messages received from Contact Form");
  showSection("contactMessages");
}

