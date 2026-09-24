# 📚 El Racó del Llibre — Laravel Ecommerce Bookstore With Gamification (Fidelity System)


[![Laravel](https://img.shields.io/badge/Laravel-10-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](#)
[![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](#)
[![Blade](https://img.shields.io/badge/Blade-Templates-F05340?style=for-the-badge&logo=laravel&logoColor=white)](#)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](#)
[![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white)](#)
[![Academic Project](https://img.shields.io/badge/Project-M5%20Repte-003366?style=for-the-badge)](#)

El Racó del Llibre is an online bookstore developed for the **M5 Repte** project.

The application allows users to browse books, filter the catalogue, create an account, log in, manage a shopping cart, and complete purchases. It also includes a section focused on book donation, book reuse, collection points, and the **United Nations Sustainable Development Goals**.

I developed the project using Laravel and organized it following the usual MVC structure, with separate controllers, models, services, Blade views, migrations, and frontend assets.

---

## Table of Contents

- [Project Overview](#project-overview)
- [Main Features](#main-features)
- [Book Catalogue](#book-catalogue)
- [Filtering Books](#filtering-books)
- [Authentication and Registration](#authentication-and-registration)
- [Shopping Cart](#shopping-cart)
- [User Statuses and Discounts](#user-statuses-and-discounts)
- [ODS and Sustainability Section](#ods-and-sustainability-section)
- [Application Architecture](#application-architecture)
- [Project Structure](#project-structure)
- [Database Structure](#database-structure)
- [Routes](#routes)
- [Technology Stack](#technology-stack)
- [Requirements](#requirements)
- [Installation](#installation)
- [Environment Configuration](#environment-configuration)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)
- [Useful Commands](#useful-commands)
- [Documentation](#documentation)
- [Troubleshooting](#troubleshooting)
- [Security Notes](#security-notes)
- [Future Improvements](#future-improvements)
- [Academic Context](#academic-context)
- [Author](#author)
- [License](#license)

---

## Project Overview

The main idea of El Racó del Llibre is to create a complete bookstore experience instead of only displaying a list of books.

The application includes:

- A public home page.
- A complete book catalogue.
- Book filtering by price and category.
- User registration and login.
- Authenticated user dashboards.
- Shopping cart management.
- Stock validation.
- Checkout functionality.
- User discounts.
- Purchase history.
- Information about book donation and reuse.
- A map showing collection points.

The user interface is mainly written in Catalan, including the route names, database fields, model names, and messages shown to the user.

<img width="921" height="757" alt="image" src="https://github.com/user-attachments/assets/324ff8e7-8abe-4ea0-853d-4e1d3fbd8ac8" />

---

## Main Features

- Display books from the database.
- Paginate the product catalogue.
- Filter books by minimum and maximum price.
- Filter books by category.
- Display book details in modal windows.
- Register new users.
- Log in and log out.
- Create a shopping cart for each user.
- Add books to the cart.
- Remove individual cart items.
- Empty the entire cart.
- Change the quantity of a book.
- Validate the available stock.
- Complete purchases.
- Create a new cart after payment.
- Calculate cart totals.
- Apply discounts according to the user status.
- Display previous paid carts.
- Show sustainability information.
- Display donation and collection points on a map.
- Use Laravel migrations for the database structure.
- Use a service class for cart operations.

---

## Book Catalogue

<img width="1267" height="722" alt="image" src="https://github.com/user-attachments/assets/5c39c481-dc0e-45d1-b48c-b3184c077bd2" />

Books are represented by the `Llibre` model:

```text
app/Models/Llibre.php
```

The catalogue is displayed in:

```text
resources/views/productes.blade.php
```

Every book can contain the following information:

- ISBN.
- Title.
- Author.
- Description.
- Category.
- Subcategory.
- Stock.
- Image.
- Price.
- Cover type.

The database table used by the catalogue is:

```text
llibres
```

The migration creates the following fields:

```text
id
isbn
titol
autor
descripcio
categoria
subcategoria
stock
imatge
preu
tapa
created_at
updated_at
```

The available cover types are:

```text
dura
blanda
```

The `Llibre` model also calculates a shipping price depending on the cover type:

| Cover type | Shipping price |
| :--- | :---: |
| `blanda` | `1` |
| `dura` | `2` |

The catalogue uses Laravel pagination, with up to 50 books per page.

---

## Filtering Books

Users can filter books using:

- Minimum price.
- Maximum price.
- Category.

The filter form is located in:

```text
resources/views/productes.blade.php
```

The request is sent to:

```text
GET /filtrar-libros
```

The filtering logic is implemented in:

```text
app/Http/Controllers/ProductesController.php
```

The controller creates a query using the `preu` and `categoria` fields.

The current categories include:

```text
Juvenil
Còmics i manga
Infantil
Novel·la
Poesia
Teatre
Ciència-ficció
Història
Formació
Idiomes
Art
Biografia
Ciències
Cuina
Viatges
```

The filtered results are ordered by price and paginated.

---

## Authentication and Registration

The application includes a registration and login system based on Laravel authentication.

### Registration

Registration is handled by:

```text
app/Http/Controllers/RegistreController.php
```

The form validates:

- Name.
- Email.
- Password.
- Password confirmation.

The validation rules require:

```text
Name: required string
Email: required, valid email, and unique
Password: at least 8 characters
Password confirmation: required
```

After registration:

1. The user is created.
2. The default status is set to `Normal`.
3. The user is logged in automatically.
4. An active shopping cart is created.
5. The user is redirected into the application.

### Login and Logout

The authentication logic is located in:

```text
app/Http/Controllers/AuthController.php
```

Login uses Laravel's authentication system:

```php
Auth::attempt($credentials);
```

Users log in using:

- Email.
- Password.

Logout is handled with:

```php
Auth::logout();
```

---

## Shopping Cart

The cart functionality is divided between:

```text
app/Http/Controllers/CarritoController.php
app/Services/CarritoService.php
```

I placed the main cart operations inside `CarritoService` so the controller does not contain all the business logic.

Users can:

- Add books to the cart.
- Remove products.
- Empty the cart.
- Change quantities.
- Complete a purchase.

### Cart Operations

The available routes are:

```text
POST   /agregar-al-carrito/{id}
DELETE /carrito/eliminar/{id}
DELETE /carrito/buidar
DELETE /carrito/pagar
POST   /carrito/editar-cantidad/{id}
```

### Stock Validation

When the user changes the quantity of a product, the application checks the available stock.

If the requested quantity is higher than the stock:

- The quantity is reduced to the available stock.
- The cart item is saved again.
- A message is displayed to the user.

### Cart Payment

When a cart is paid:

1. The current cart is marked as paid.
2. A new active cart is created.
3. The user can continue shopping.

The `pagado` field identifies whether a cart is still active or has already been completed.

---

## User Statuses and Discounts

The project includes a user-status system based on object-oriented programming.

<img width="1758" height="773" alt="descomptes" src="https://github.com/user-attachments/assets/c4eeda3a-7e09-48ff-bcf6-09f2a7ff8502" />

The available statuses are:

```text
Normal
Original
Genuino
Leyenda
```

The related classes are:

```text
app/Models/EstatUser.php
app/Models/NormalUser.php
app/Models/OriginalUser.php
app/Models/GenuinoUser.php
app/Models/LeyendaUser.php
```

The `User` model implements the `EstatUser` interface and selects the correct status class according to the value stored in the database.

The discount is obtained with:

```php
$user->getDescompte();
```

The `Carrito` model uses the discount when calculating the final price:

```php
$carrito->calcularTotalAmbDescompte();
```

The cart also includes methods for calculating:

```php
calcularTotal()
calcularTotalAmbDescompte()
calcularDescompte()
```

This part of the application was created to apply object-oriented concepts within a real Laravel project.

---

## ODS and Sustainability Section

The application includes a dedicated ODS section:

```text
GET /ODS
```

The view is located in:

```text
resources/views/ODS.blade.php
```

This section focuses on:

- Donating books.
- Reusing books that have already been read.
- Supporting access to education.
- Reducing waste.
- Creating sustainable communities.
- Providing book collection points.

The content connects the project with several Sustainable Development Goals:

- **ODS 4 — Quality Education**
- **ODS 10 — Reduced Inequalities**
- **ODS 11 — Sustainable Cities and Communities**
- **ODS 16 — Peace, Justice and Strong Institutions**

### Map Integration

The ODS page uses Leaflet to display donation and collection points.

The page includes:

```text
Leaflet 1.9.4
```

The map-related JavaScript file is:

```text
public/js/DOM_geolocal.js
```

The page includes:

- A collection-point selector.
- A map.
- Latitude and longitude fields.
- Location information.
- Information about donating books.

---

## Application Architecture

The application follows Laravel's MVC structure.

```text
┌─────────────────────────────┐
│        Blade Views          │
│                             │
│  home                       │
│  productes                  │
│  dashboard                  │
│  registre                   │
│  ODS                        │
└──────────────┬──────────────┘
               │
               ▼
┌─────────────────────────────┐
│        Web Routes           │
│                             │
│  routes/web.php             │
└──────────────┬──────────────┘
               │
               ▼
┌─────────────────────────────┐
│        Controllers          │
│                             │
│  HomeController             │
│  ProductesController        │
│  AuthController             │
│  RegistreController         │
│  CarritoController          │
│  DashboardController        │
│  ODSController              │
└──────────────┬──────────────┘
               │
               ▼
┌─────────────────────────────┐
│       Services and Models   │
│                             │
│  CarritoService             │
│  User                       │
│  Llibre                     │
│  Carrito                    │
│  CarritoItem                │
└──────────────┬──────────────┘
               │
               ▼
┌─────────────────────────────┐
│          Database           │
│                             │
│  users                      │
│  llibres                    │
│  carritos                   │
│  carrito_items              │
└─────────────────────────────┘
```

The normal request flow is:

```text
Browser request
    ↓
Route in routes/web.php
    ↓
Controller
    ↓
Model or service
    ↓
Database
    ↓
Blade view
    ↓
HTML response
```

---

## Project Structure

```text
.
├── Documentation/
│   ├── ECO/
│   │   ├── Repte_M5_ECO.docx
│   │   ├── Repte_M5_ECO.pdf
│   │   ├── Repte_M5_ECO_Competències_Transversals.docx
│   │   └── Repte_M5_ECO_Competències_Transversals.pdf
│   │
│   ├── POO/
│   │   ├── Diagrames/
│   │   ├── Diagrames.zip
│   │   ├── Repte_M5_POO.docx
│   │   ├── Repte_M5_POO.pdf
│   │   ├── Repte_M5_POO _Competències_Transversals.docx
│   │   └── Repte_M5_POO _Competències_Transversals.pdf
│   │
│   └── TA/
│       ├── Repte_M5_TA.docx
│       ├── Repte_M5_TA.pdf
│       ├── Repte_M5_TA _Competències_Transversals.docx
│       └── Repte_M5_TA _Competències_Transversals.pdf
│
├── Laravel source code files/
│   └── example-app/
│       ├── app/
│       │   ├── Console/
│       │   ├── Exceptions/
│       │   ├── Http/
│       │   │   ├── Controllers/
│       │   │   ├── Kernel.php
│       │   │   └── Middleware/
│       │   ├── Models/
│       │   ├── Providers/
│       │   └── Services/
│       │
│       ├── bootstrap/
│       ├── config/
│       ├── database/
│       │   ├── factories/
│       │   ├── migrations/
│       │   └── seeders/
│       │
│       ├── public/
│       ├── resources/
│       │   ├── css/
│       │   ├── js/
│       │   └── views/
│       │       ├── plantillas/
│       │       ├── ODS.blade.php
│       │       ├── dashboard.blade.php
│       │       ├── home.blade.php
│       │       ├── productes.blade.php
│       │       ├── registre.blade.php
│       │       └── welcome.blade.php
│       │
│       ├── routes/
│       │   ├── api.php
│       │   ├── channels.php
│       │   ├── console.php
│       │   └── web.php
│       │
│       ├── storage/
│       ├── tests/
│       ├── artisan
│       ├── composer.json
│       ├── package.json
│       ├── phpunit.xml
│       └── vite.config.js
│
├── Object Oriented Programming Doc.pdf
├── Presentació del repte (Global) A2S1 M5 .pptx
├── .gitattributes
└── README.md
```

---

## Database Structure

The main database migrations are located in:

```text
Laravel source code files/example-app/database/migrations/
```

### Users

The `users` table stores the registered users.

Project-specific fields include:

```text
name
email
password
estatus
```

### Books

The `llibres` table stores the books available in the catalogue:

```text
id
isbn
titol
autor
descripcio
categoria
subcategoria
stock
imatge
preu
tapa
created_at
updated_at
```

### Shopping Carts

The `carritos` table stores the carts associated with each user:

```text
id
user_id
pagado
created_at
updated_at
```

### Cart Items

The `carrito_items` table stores the products inside each cart:

```text
id
carrito_id
llibre_id
cantidad
created_at
updated_at
```

### Relationships

```text
User
 └── hasMany Carrito

Carrito
 └── hasMany CarritoItem

CarritoItem
 └── belongsTo Llibre
```

---

## Routes

The main routes are defined in:

```text
routes/web.php
```

### General Routes

| Method | Route | Description |
| :--- | :--- | :--- |
| `GET` | `/` | Home page |
| `GET` | `/home` | Home page |
| `GET` | `/productes` | Book catalogue |
| `GET` | `/filtrar-libros` | Filter books |
| `GET` | `/ODS` | Sustainability section |
| `GET` | `/dashboard` | User dashboard |
| `GET` | `/registre` | Registration page |
| `POST` | `/registrar` | Register a new user |

### Authentication Routes

| Method | Route | Description |
| :--- | :--- | :--- |
| `POST` | `/login` | Log in |
| `POST` | `/logout` | Log out |

### Shopping Cart Routes

| Method | Route | Description |
| :--- | :--- | :--- |
| `POST` | `/agregar-al-carrito/{id}` | Add a book to the cart |
| `DELETE` | `/carrito/eliminar/{id}` | Remove a cart item |
| `DELETE` | `/carrito/buidar` | Empty the current cart |
| `DELETE` | `/carrito/pagar` | Complete the purchase |
| `POST` | `/carrito/editar-cantidad/{id}` | Change the quantity of an item |

### API Route

The default Laravel Sanctum route is available at:

```text
GET /api/user
```

This route returns the authenticated API user when a valid Sanctum token is provided.

---

## Technology Stack

### Backend

- PHP 8.1+
- Laravel 10
- Laravel Eloquent
- Laravel Sanctum
- Composer
- Blade templates

### Frontend

- HTML
- CSS
- JavaScript
- Vite
- Axios
- Leaflet
- Bootstrap components

### Development and Testing

- PHPUnit
- Laravel Pint
- Laravel Tinker
- Laravel Sail
- FakerPHP
- Mockery

---

## Requirements

To run the project locally, install:

- PHP 8.1 or newer.
- Composer.
- Node.js and npm.
- MySQL or another Laravel-supported database.
- Git.

Check the installed versions:

```bash
php --version
composer --version
node --version
npm --version
```

---

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/Andormix/Repte-M5.git
cd Repte-M5
```

### 2. Open the Laravel Application

```bash
cd "Laravel source code files/example-app"
```

### 3. Install PHP Dependencies

```bash
composer install
```

### 4. Install Frontend Dependencies

```bash
npm install
```

### 5. Create the Environment File

#### Windows PowerShell

```powershell
Copy-Item .env.example .env
```

#### macOS/Linux

```bash
cp .env.example .env
```

### 6. Generate the Application Key

```bash
php artisan key:generate
```

---

## Environment Configuration

Edit the `.env` file with the local application and database settings.

Example:

```env
APP_NAME=El Racó del Llibre
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=repte_m5
DB_USERNAME=root
DB_PASSWORD=
```

The `.env` file must remain local and should not be committed to the repository.

---

## Database Setup

Create the database before running the migrations.

Example:

```sql
CREATE DATABASE repte_m5;
```

Run the migrations:

```bash
php artisan migrate
```

To recreate all tables:

```bash
php artisan migrate:fresh
```

If the project contains seeders:

```bash
php artisan migrate:fresh --seed
```

The main tables are:

```text
users
llibres
carritos
carrito_items
```

---

## Running the Application

Start the Laravel development server:

```bash
php artisan serve
```

The application should be available at:

```text
http://127.0.0.1:8000
```

In a second terminal, start Vite:

```bash
npm run dev
```

The normal development setup is:

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

Then open:

```text
http://127.0.0.1:8000
```

---

## Useful Commands

Show all application routes:

```bash
php artisan route:list
```

Clear Laravel caches:

```bash
php artisan optimize:clear
```

Run the test suite:

```bash
php artisan test
```

Open Laravel Tinker:

```bash
php artisan tinker
```

Run migrations:

```bash
php artisan migrate
```

Roll back the last migration batch:

```bash
php artisan migrate:rollback
```

Build the frontend assets:

```bash
npm run build
```

Start the Vite development server:

```bash
npm run dev
```

Format PHP files with Laravel Pint:

```bash
./vendor/bin/pint
```

---

## Documentation

The repository includes documentation for the different parts of the M5 project.

### Economics

```text
Documentation/ECO/
```

Main files:

```text
Repte_M5_ECO.docx
Repte_M5_ECO.pdf
Repte_M5_ECO_Competències_Transversals.docx
Repte_M5_ECO_Competències_Transversals.pdf
```

### Object-Oriented Programming

```text
Documentation/POO/
```

Main files:

```text
Repte_M5_POO.docx
Repte_M5_POO.pdf
Repte_M5_POO _Competències_Transversals.docx
Repte_M5_POO _Competències_Transversals.pdf
Diagrames.zip
Diagrames/
```

### Transversal Competencies

```text
Documentation/TA/
```

Main files:

```text
Repte_M5_TA.docx
Repte_M5_TA.pdf
Repte_M5_TA _Competències_Transversals.docx
Repte_M5_TA _Competències_Transversals.pdf
```

### Global Presentation

```text
Presentació del repte (Global) A2S1 M5 .pptx
```

---

## Troubleshooting

### Database Connection Errors

Check that:

- MySQL is running.
- The database exists.
- The credentials in `.env` are correct.
- The configured port is available.
- The database user has the required permissions.

After changing `.env`, clear the cached configuration:

```bash
php artisan config:clear
php artisan cache:clear
```

### Missing Database Tables

Run:

```bash
php artisan migrate
```

To recreate the database from the beginning:

```bash
php artisan migrate:fresh
```

### Empty Book Catalogue

Check that:

- The `llibres` table exists.
- Book records have been inserted.
- The migrations completed successfully.
- The database connection is correct.
- The `Llibre` model is using the correct table.

### Cart Buttons Do Not Work

Check that:

- The user is logged in.
- The user has an active cart.
- The cart tables exist.
- The book ID is valid.
- The form contains a CSRF token.
- The requested quantity does not exceed stock.

### Frontend Changes Are Not Visible

Restart Vite:

```bash
npm run dev
```

For a production build:

```bash
npm run build
```

### Composer Errors

Check the PHP version:

```bash
php --version
```

The project requires PHP 8.1 or newer.

Then run:

```bash
composer install
```

---

## Security Notes

This project was developed for academic purposes.

Before using it in production, I would review:

- Database credentials.
- Environment variables.
- Authentication and authorization.
- Cart ownership checks.
- Stock management during checkout.
- Payment handling.
- Session configuration.
- HTTPS configuration.
- Production error reporting.
- Input validation.

Debug mode should be disabled in production:

```env
APP_DEBUG=false
```

The `.env` file should never be uploaded to GitHub.

---

## Future Improvements

Some improvements I would like to add in a future version are:

- An administration panel for managing books.
- Better stock management.
- A complete order model.
- Real payment integration.
- Order confirmation emails.
- Order status tracking.
- Search by title, author, or ISBN.
- Sorting by price or category.
- Book reviews and ratings.
- A wishlist.
- More database seeders.
- More automated tests.
- Improved cart authorization.
- Better mobile responsiveness.
- Multilingual support.
- Database-based donation locations.
- A dedicated REST API.
- Improved user discount management.
- Stock reservation during checkout.

---

## Academic Context

I developed this project as part of the **M5 Repte** academic work.

The project combines:

- Laravel development.
- PHP programming.
- Object-oriented programming.
- MVC architecture.
- Database design.
- Authentication.
- E-commerce functionality.
- Frontend development.
- Sustainable development concepts.
- Technical documentation.

The user-status classes were created to apply object-oriented programming concepts within the Laravel application. The cart system also uses a service class to separate the business logic from the controller.

---

## Author

Developed by **Eric Torrontera Ruiz**.

---

## License

This project was created for academic and educational purposes.

Laravel and the external packages used by the application are distributed under their respective licenses. The project code and documentation should be reused according to the applicable academic and third-party licensing conditions.
