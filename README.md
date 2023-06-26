# High School Education Panel 

High School Education Panel is a web application developed using Laravel framework that provides various features related to managing academic activities for teachers, students, and administrators. The application provides features such as assignment submission, grade input, attendance tracking, and access to educational videos.

## Features

- Student Management: Manage students' personal and academic information, such as attendance, grades, and assignments.
- Teacher Management: Manage teachers' information and assign courses to them.
- Course Management: Manage courses and their descriptions, and assign them to teachers.
- Attendance Tracking: Keep track of student attendance and generate reports.
- Assignment Submission: Allow students to submit their assignments and enable teachers to grade them.
- Grade Input: Allow teachers to input grades and provide feedback to students.
- Video Content: Provide access to educational videos for students.


## Installation

To install the application, follow these steps:

1. Clone the repository from GitHub.
“`
git clone https://github.com/serkankrdag/EdPanel.git
“`
2. Install the required packages.
“`
composer install
“`
3. Create a .env file from the example file.
“`
cp .env.example .env
“`
4. Migrate the database.
“`
php artisan migrate
“`
5. Seed the database with sample data (optional).
“`
php artisan db:seed
“`
6. Start the development server.
“`
php artisan serve
“`nv.example .env
“`

## Usage

To use the application, navigate to the URL where the development server is running. You can then log in as an administrator, teacher, or student and access the features available for your role.

## Contributing

Contributions are welcome! If you find a bug or want to add a feature, please create an issue or submit a pull request.  
