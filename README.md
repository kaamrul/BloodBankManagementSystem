# Online Blood Bank Management System

The project is aimed to automate the blood bank sector which is manually maintained. In the Manual system, people have to visit blood bank for donate blood or taking blood. After the automation this will mean better services and good keeping of records, data integrity, data security, quick search and also paperless environment. Every user of the system will have to log in to the system using email and password so that security and authentication will be ensured. Once logged in, a user can make a blood request, check request status. The Donor will be accept or reject blood request.  The system administrator is able to manage campaign, donor information and also monitoring the whole system. The purpose of these development included in this project is to replace the manual system with a digital computerized system. This system is developed by PHP.

## Objectives
- To develop a system that provides functions to support donors to view and manage their information conveniently. 
- To maintain records of blood donors, blood donation information and blood stocks in a centralized database system. 
- To inform donors of their blood result after their donation. 
- To support searching, matching and requesting for blood convenient for administrators. 
- To provide a function to send an e-mail directly to the donor for their user account and the hospital, the availability of the blood bag.

## Key features:
### Blood Donor
- A user can registration in this system as a donor and able to insert and update his/her information (profile). 
- The donor can see acceptor request. 
- The donor also can see the acceptor information. 
- A donor can accept or reject the acceptor blood request.

### Blood Acceptor
- A new user can registration in this system as an acceptor and able to insert his/her information (profile). 
- Acceptor can see the donor and blood bank information. 
- Acceptor can send a request to the donor or blood bank. 
- Acceptor can see the request status.
- Acceptor can search blood by search blood group or preferred location.

### Admin
- Admin can manage registration for acceptor, donor and blood bank. 
- Admin manages blood bank information like (update, delete). 
- Admin can manage acceptor information like (update, delete). 
- Admin can manage donor information like (update, delete).
- Admin can add campaign 
- Admin can change campaign information.
- Admin can see total number of donors registered here. 
- Admin can see total number of acceptors registered here.

### Report Generate
- The system will check the privilege of the user, Only Admin can access. 
- On the report generation page, Enter the data range, enter ‘From date to ‘To’ date. The ‘to dates will be the ahead dates of ‘From’ dates. 
- When the dates are Entered, the system will start searching for data, If no record is found pop-up windows will appear and show ‘No data found’ msg. 
- Admin can save the report in pdf/excel format. 
- Admin can print the report, but he/she cannot save the report.

## Project Development
This project is developed by,
- PHP 
- HTML, CSS
- jQuery, JavaScript

**Note:** The database name of this project is **"bbms"** and **blood_bank.sql** file is inside the **'db'** folder. If you want to clone and use the project, then after cloning rename the base folder as **"BBMS"**. Otherwise this application will not work properly. If you want to make change the base folder as you want, you have to change the base_url from config and also change .htaccess file. 

**Fell free to frok and cotributing in this project. For more query related to this project, contact me through email.**

Thanks & Regards

*[Md. Kamrul Hasan]*

`Email: mk.kamrulhasan69@gmail.com`