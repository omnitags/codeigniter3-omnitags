# Omnitags

Omnitags is a custom-built **Object-Relational Mapping (ORM)** framework designed to enhance flexibility and scalability in web application development. By combining structured database management with dynamic configurations, Omnitags simplifies how data, routes, and files interact within a project. Its standout feature is the integration of a **Postman environment JSON file** to manage dynamic schemas, fields, routes, and file structures seamlessly.

---

## About the repository and branches

This repository is where I experiment with Omnitags and its implementation. The primary goal of this project is to streamline framework usage, making it easier to deploy and manage multiple projects without the repetitive process of copying and pasting. With Omnitags, I aim to improve the efficiency of project distribution through branches, enabling quicker and more dynamic framework integration across different applications.

---

## Purpose

Omnitags simplifies the setup and deployment of various projects by utilizing a branch-based implementation rather than manual duplication, saving both time and effort. It’s designed to scale seamlessly across different web projects, making framework management more efficient and flexible.

---

## Past Projects Built Using Omnitags

### 1. [Hotel Hebat](http://hotelkhenjy.com) (Hotel Management Website)

**Description**: Hotel Hebat is a comprehensive hotel management system built to handle room bookings, transactions, guest management, and hotel operations. This project showcases Omnitags' ability to manage complex, feature-rich applications with a focus on usability, scalability, and a responsive UI. The hotel management system supports multi-user functionality, transaction histories, and content management features.

### 2. [RecycleAware](http://hotelkhenjy.com/recycleaware) (Recycling Awareness Website)

**Description**: RecycleAware is a website aimed at raising awareness about plastic recycling. Built with Omnitags, this project demonstrates how a flexible framework can be used to create community-driven platforms. It includes features for sharing recycling tips, showcasing recycled products, and engaging users in environmental discussions.

### 3. [Levato](http://hotelkhenjy.com/levato) (UMKM Inquiry Website)

**Description**: Levato is designed as an inquiry system for UMKMs (Micro, Small, and Medium Enterprises), providing a platform for businesses to register inquiries and communicate with potential partners or clients. Using Omnitags, Levato was developed quickly and efficiently, allowing for smooth scalability and management of user inquiries and business listings.

### 4. [BarangMaster](http://hotelkhenjy.com/inventory) (Inventory Website Built and Hosted in Under 1 Hour)

**Description**: BarangMaster showcases the speed and flexibility of Omnitags by enabling the creation and deployment of a fully functional inventory management system in less than one hour. The project includes basic inventory tracking, stock management, and reporting features, demonstrating how Omnitags can be used for rapid prototyping and deployment of critical business tools.

### 5. [BNSP](http://hotelkhenjy.com/bnsp) (Medical Website in Preparation for Career Enrichment Test)

**Description**: BNSP is a medical inventory website. I designed it to prepare for my career enrichment tests. Built using Omnitags, this website provides essential information, resources, and tools to assist users in managing medical items.

### 6. [Uvers Website](http://hotelkhenjy.com/uvers_tpl) (Experimental College Website)

**Description**: Uvers Website is an experimental platform aimed at replicating a college website experience. Built using Omnitags, the site offers a dynamic environment for experimenting with different educational features, content structures, and layout designs that are common in academic institutions.

---

## How Omnitags Works

Omnitags relies on a branch-based approach to project management, allowing for different modules and applications to exist within the same repository. This means that instead of starting from scratch or copying existing codebases, users can simply switch between branches to implement or modify the framework for various projects. This approach saves development time and ensures consistency across applications.

---

# Setting Up a CodeIgniter 3 Project

This guide walks you through setting up a **CodeIgniter 3** project from scratch, ensuring a smooth process for both development and deployment.

---

## Prerequisites

Before you begin, make sure you have the following:

- **PHP**: Version **7.x** (PHP 8+ may not be compatible with CodeIgniter 3).
- **Web Server**: Laragon or XAMPP installed on your machine.
- **Database**: MySQL (usually included with Laragon/XAMPP).
- **SQL File**: The database schema file for this project.

---

## Step 1: Clone or Download the Project

1. Clone the repository:
   ```bash
   git clone https://github.com/your-repository/omnitags.git
   ```
2. Download the ZIP file and extract it to your desired location.

---

## Step 2: Move the Project Files

### For Laragon

1. Move the project folder to Laragon’s `www` directory:
   ```
   C:\laragon\www\project-folder
   ```
2. Restart Laragon to ensure it detects the new project.

### For XAMPP

1. Place the project folder in XAMPP’s `htdocs` directory:
   ```
   C:\xampp\htdocs\project-folder
   ```

---

## Step 3: Configure the Base URL

1. Open `application/config/config.php`.
2. Locate the following line:
   ```php
   $config['base_url'] = '';
   ```
3. Set it to match your local environment. For example:
   ```php
   $config['base_url'] = 'http://localhost/project-folder/';
   ```

---

## Step 4: Configure the Database

1. Open `application/config/database.php`.
2. Update the settings to match your database credentials:
   ```php
   $db['default'] = array(
       'hostname' => 'localhost',
       'username' => 'root',
       'password' => '',
       'database' => 'your_database_name',
       'dbdriver' => 'mysqli'
   );
   ```

---

## Step 5: Import the Database

1. Open your database management tool (e.g., phpMyAdmin).
2. Create a new database, e.g., `project_database`.
3. Import the provided `.sql` file.

---

## Step 6: Configure Permissions

Ensure `application/cache` and `application/logs` have writable permissions:

### On Linux

```bash
chmod -R 775 application/cache
chmod -R 775 application/logs
```

---

## Step 7: Run the Application

Start your web server (Apache + MySQL). Open your browser and navigate to:

```
http://localhost/project-folder/
```

---

## Troubleshooting

1. **Blank Screen**:

   - Ensure the PHP version is below 8.0.
   - Enable error reporting in `index.php`:
     ```php
     error_reporting(E_ALL);
     ini_set('display_errors', 1);
     ```

2. **Database Connection Issues**:

   - Verify the settings in `database.php`.

3. **404 Errors**:
   - Ensure `.htaccess` exists with the following content:
     ```apache
     RewriteEngine On
     RewriteCond %{REQUEST_FILENAME} !-f
     RewriteCond %{REQUEST_FILENAME} !-d
     RewriteRule ^(.*)$ index.php/$1 [L]
     ```

---

You’re all set! Explore and build your CodeIgniter 3 project with Omnitags. 🚀
