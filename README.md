School-admissions-portal
Description
A simple web-based admission system built with HTML, CSS, and PHP that allows applicants to submit applications and administrators to update application statuses.  

Features
- Applicants can submit their name, email, and desired program.  
- Admins can view applications, filter by status, and update statuses (Pending, Accepted, or Rejected).  
- A custom message can be added when updating an application’s status.  
- Uses MySQL for database storage.  

Project Structure
admission-system/
│── db.php                  Database connection  
│── index.php               Displays applications and allows filtering  
│── apply.php               Applicant submission form  
│── submit.php              Handles application form submissions  
│── update.php              Admin page to update applicant status  
│── header.php              Navigation and header  
│── footer.php              Footer section  
│── style.css               Styles for the application  
│── applications.sql        Database schema  
```

Usage
1. Applicants can submit their details via `apply.php`.  
2. Admins can view and update applications via `index.php` and `update.php`.  
3. The status of applications can be set to Pending, Accepted, or Rejected with a custom message.  
