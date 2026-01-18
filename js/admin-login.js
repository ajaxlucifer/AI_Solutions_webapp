// Admin Login JavaScript
// Handles authentication, form validation, and demo functionality

document.addEventListener("DOMContentLoaded", function () {
  initAdminLogin();
});

function initAdminLogin() {
  const loginForm = document.getElementById("adminLoginForm");
  const togglePassword = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("password");
  const loginBtn = document.getElementById("loginBtn");

  // Demo credentials
  const demoUsers = {
    admin: {
      password: "admin123",
      role: "Super Admin",
      permissions: ["all"],
      dashboard: "../pages/admin-dashboard.php",
    },
    manager: {
      password: "manager123",
      role: "Manager",
      permissions: ["users", "reports", "settings"],
      dashboard: "../pages/admin-dashboard.php",
    },
    analyst: {
      password: "analyst123",
      role: "Data Analyst",
      permissions: ["reports", "analytics"],
      dashboard: "../pages/admin-dashboard.php",
    },
  };

  // Password toggle functionality
  if (togglePassword && passwordInput) {
    togglePassword.addEventListener("click", function () {
      const type =
        passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);

      const icon = this.querySelector("i");
      icon.classList.toggle("fa-eye");
      icon.classList.toggle("fa-eye-slash");
    });
  }

  // Form submission
  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      handleLogin();
    });
  }

  function handleLogin() {
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value;
    const rememberMe = document.getElementById("rememberMe").checked;

    // Validation
    if (!username || !password) {
      showAlert("Please fill in all fields", "error");
      return;
    }

    // Show loading state
    setLoadingState(true);

    // Simulate API call delay
    setTimeout(() => {
      if (demoUsers[username] && demoUsers[username].password === password) {
        // Successful login
        const user = demoUsers[username];

        // Store user session
        const sessionData = {
          username: username,
          role: user.role,
          permissions: user.permissions,
          loginTime: new Date().toISOString(),
          rememberMe: rememberMe,
        };

        if (rememberMe) {
          localStorage.setItem("adminSession", JSON.stringify(sessionData));
        } else {
          sessionStorage.setItem("adminSession", JSON.stringify(sessionData));
        }

        showAlert("Login successful! Redirecting...", "success");

        // Redirect to dashboard
        setTimeout(() => {
          window.location.href = user.dashboard;
        }, 1500);
      } else {
        showAlert("Invalid credentials. Please try again.", "error");
        setLoadingState(false);
      }
    }, 1500);
  }

  function setLoadingState(loading) {
    const btnText = document.querySelector(".btn-text");
    const btnIcon = document.querySelector(".btn-icon");
    const btnLoader = document.querySelector(".btn-loader");

    if (loading) {
      btnText.style.display = "none";
      btnIcon.style.display = "none";
      btnLoader.style.display = "flex";
      loginBtn.disabled = true;
    } else {
      btnText.style.display = "inline";
      btnIcon.style.display = "inline";
      btnLoader.style.display = "none";
      loginBtn.disabled = false;
    }
  }
}

// Fill demo credentials function
function fillDemoCredentials(username, password) {
  document.getElementById("username").value = username;
  document.getElementById("password").value = password;

  // Add visual feedback
  const demoCards = document.querySelectorAll(".demo-card");
  demoCards.forEach((card) => card.classList.remove("selected"));

  // Find and highlight the clicked card
  event.target.closest(".demo-card").classList.add("selected");

  showAlert(`Demo credentials filled for ${username}`, "success");
}

// Alert system
function showAlert(message, type = "info") {
  const alertContainer = document.getElementById("alertContainer");

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

// Add selected state CSS for demo cards
const style = document.createElement("style");
style.textContent = `
    .demo-card.selected {
        background: rgba(220, 38, 38, 0.1) !important;
        border-color: #dc2626 !important;
        transform: translateY(-2px);
    }
    
    .alert-close {
        background: none;
        border: none;
        color: inherit;
        cursor: pointer;
        padding: 0.25rem;
        border-radius: 4px;
        transition: background-color 0.2s;
    }
    
    .alert-close:hover {
        background: rgba(0, 0, 0, 0.1);
    }
`;
document.head.appendChild(style);

// Check for existing session on page load
function checkExistingSession() {
  const sessionData =
    localStorage.getItem("adminSession") ||
    sessionStorage.getItem("adminSession");

  if (sessionData) {
    try {
      const session = JSON.parse(sessionData);
      const loginTime = new Date(session.loginTime);
      const now = new Date();
      const hoursSinceLogin = (now - loginTime) / (1000 * 60 * 60);

      // Session valid for 24 hours for localStorage, 8 hours for sessionStorage
      const maxHours = localStorage.getItem("adminSession") ? 24 : 8;

      if (hoursSinceLogin < maxHours) {
        showAlert(`Welcome back, ${session.role}!`, "success");
        setTimeout(() => {
          window.location.href = "admin-dashboard.php";
        }, 2000);
      } else {
        // Session expired
        localStorage.removeItem("adminSession");
        sessionStorage.removeItem("adminSession");
      }
    } catch (e) {
      // Invalid session data
      localStorage.removeItem("adminSession");
      sessionStorage.removeItem("adminSession");
    }
  }
}

// Check session when page loads
document.addEventListener("DOMContentLoaded", checkExistingSession);
