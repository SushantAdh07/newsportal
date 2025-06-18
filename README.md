## News Portal
<a href="https://ibb.co/zTBxH3X6"><img src="https://i.ibb.co/PvPjz2cD/Screenshot-28.png" alt="News Portal" border="0"></a>

## Overview

This is a feature-rich news portal built with Laravel that includes:
<ol>
<li>Role-based user access (Admin, Editor, Author, Reader)</li>
<li>Dynamic news management</li>
<li>Category-based news organization</li>
<li>Modern UI with responsive design</li>
</ol>

## Features
**User Management**

<ul>
    <li>Roles: Admin, Editor, Author, Reader</li>
    <li>Registration & Authentication</li>
    <li>Profile Management</li>
    <li>Password Reset</li>
</ul>

**News Management**
<ul>
    <li>Create, Read, Update, Delete news articles</li>
    <li>Rich text editor for content creation</li>
    <li>News categorization</li>
    <li>Featured news section</li>
    <li>News scheduling (publish now or later)</li>
</ul>


**Categories**
<ul>
    <li>Dynamic category management</li>
    <li>Category-specific news listing</li>
    <li>Category hierarchy support</li>
</ul>

**Additional Features**
<ul>
    <li>Comments system</li>
    <li>News search functionality</li>
    <li>Newsletter subscription</li>
    <li>Social media sharing</li>
    <li>Related news suggestions</li>
</ul>

## Installation
**Prerequisites**
<ul>
    <li>PHP 8.0 or higher</li>
    <li>Composer</li>
    <li>MySQL</li>
</ul>

## Steps
**Clone the repository:**

```
git clone https://github.com/yourusername/news-portal.git
cd news-portal
```
**Install dependencies:**
```
composer install
npm install
```
**Create and configure .env file:**

```
cp .env.example .env
```
**Generate application key:**

```
php artisan key:generate
```

**Run migrations and seeders:**
```
php artisan migrate --seed
```

**Compile frontend assets:**
```
npm run dev

# or for production
npm run build
```

**Start the development server:**
```
php artisan serve
```

