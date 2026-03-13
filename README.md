# Beyond Orbit 

Beyond Orbit is a comprehensive space-themed mission management and astronaut coordination system. Designed for high-stakes space exploration, it provides a seamless interface for Directors to manage missions and for Astronauts to report their progress and request essential supplies.

##  Project Overview
The system facilitates communication and logistical management between **Mission Control (Directors)** and **Field Operations (Astronauts)**. It features a modern, "space-vibe" UI with glassmorphism effects, vibrant color palettes, and responsive layouts.

---

##  User Roles & Functionalities

### 1. Director (Mission Control)
The Director serves as the master coordinator of all orbital operations.

*   **Command Dashboard**: Monitor real-time system stats including total missions, active personnel, and the status of all logistics requests.
*   **Mission Protocols**: Initiate new mission protocols with specific launch windows.
*   **Personnel Assignment**: Deploy astronauts to specific missions to ensure operation success.
*   **Logistics Management**: Review incoming supply requisitions from the field. Directors have the authority to **Approve** or **Reject** requests based on mission priority.
*   **Transmission Monitoring**: View the latest mission logs sent by astronauts to stay updated on field conditions.

### 2. Astronaut (Field Operations)
Astronauts are the hands-on explorers executed missions assigned by Command.

*   **Mission Briefing**: Access a personalized view of all assigned missions and launch details.
*   **Field Reporting**: Transmit mission logs back to Mission Control to document progress or report anomalies.
*   **Supply Requisitions**: Request critical items (oxygen cylinders, food rations, etc.) for assigned missions.
*   **Requisition Tracking**: Monitor the status of supply requests in real-time, with color-coded updates (Pending, Approved, or Rejected).

---

## 🛠️ Technical Stack
*   **Backend**: PHP (Modular architecture with Controllers and Models)
*   **Database**: MySQL (Relational schema for Missions, Users, Logs, and Logistics)
*   **Frontend**: Vanilla HTML5 & CSS3 (Glassmorphism design system)
*   **Logic**: JavaScript (Dynamic UI updates and form handling)

---

##  Key Features
*   **Secure Authentication**: Role-based access control for Directors and Astronauts.
*   **Intelligent Date Validation**: Mission launch windows are strictly enforced for future dates.
*   **Dynamic Logistics Workflow**: Integrated approval system for supply chain management.
*   **Profile Customization**: Users can manage their identity and profile imagery within the system.
*   **Space Aesthetics**: A premium, dark-mode-first design with smooth micro-animations and responsive components.

---

##  Installation & Setup
1. Clone the repository into your local server directory (e.g., `htdocs` for XAMPP).
2. Import the `schema.sql` file into your MySQL database.
3. Configure your database connection in `models/Database.php`.
4. Access the application via your browser at `http://localhost/BeyondOrbit`.

---

**Beyond Orbit** — *To the stars and beyond.*
