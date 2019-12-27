# mall-management-system
This project offers the administrative system for managing daily proceedings in a mall.
It is a web application which can be used to manage the sales and employees of a mall, modify their details and also to display the different products in the mall.
All of the operations/ features are integrated with a Relational Database Management System.
It consists of features such as Sales Management, Inventory Management, Employee Management, Invoice Generation.

Explanation/ Scope:
1. Software is made for centralized information maintenance of Malls from an administrator point of view.
2. Administrator is at the top of the privilege chain followed by 2 Managers for each of our departments – Clothing and Food. Each department consists of various stores and a Store Manager manages proceedings of his/her store. The last employee in the privilege chain is the Sales Clerk for handling products in the store.
3. Central administrator has the control on all the activities, w.r.t. adding, deleting, modifying database information and accessing the daily sales in the Mall.
4. Each Employee has their own login. The Administrator, Manager and Employees will be guided to different functionalities based on their individual logins.
5. Each new order accepts the Customer information, along with details of the products and the details of the store to which the product belongs.
6. A Customer is entitled to discounts on the total price of his product based on current offers. A final price for each product is generated from the database which is calculated based on the discount and quantity of products purchased.
7. An Invoice is generated in pdf format for each order highlighting all the important details of the order such as the employee who has billed the order, the details of the products purchased and the customer contact details along with a unique invoice number.
8. Our Database stores details of all the employees that includes their Personal Details and Contact Numbers, Job Information and Emergency Contact Details in case of any medical emergency.
9. Searching and Sorting functionalities based on the Employee Id and Employee Name have also been included to simplify data access for the administrator and managers.
10. A Customer Portal is available for potential Customers to view our products online. Customers have access to products of every clothing and food store. Customers can see Images and Prices of these products beforehand for them to decide which products to buy.

For more detailed explanations and involved concepts, please read the Project Report.pdf

How to Run:
1. Clone/ Download the repository.
2. Install apache dependencies to run php files OR other softwares that will allow you to run php files.
3. For Ubuntu, all php files need to be placed inside the Computer/var/www/html folder.
4. Place the JAMP_mall folder inside Computer/var/www/html folder.
5. Start localhost.
6. Go to a browser and type : localhost/JAMP_mall/index.html
