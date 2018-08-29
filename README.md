# Hermo Developer Test

Read the scenarios carefully, and craft your approach accordingly. We will evaluate based on these points:

- Databases
- Programming Logic
- Solution of approach
- Proper use of version control, in this case, Git
- The time you take to complete (based on commit history)

---

## Scenario 1

A stock of items with 3 different SKUs arrived at the warehouse. Each SKUs is 100 in quantity.
A member of the Fulfilment Team, Kumar will do the following:

1. He will count the items to make sure the quantity tally with Purchase Order
2. He registers the items by barcode scanning
3. Each items are stored by category, with location tagging


## Scenario 2

A member of the Procurement Team, Angela, was notified about **Scenario 1**.
She registers the inventory into products to sell in the website with the flag ON_SALE.
Angela also uploaded a few images for the products and setup the other information like name, price, and cost.

## Scenario 3

A customer, Amy, received a voucher code from an affiliate website. She login into our website to make purchase.
The voucher condition is as below:

- 20% Discount voucher
- Voucher code: 20FORME
- Will expire in one month from today
- Minimum purchase of RM100

Amy then checks out, fulfilling the voucher's conditions.

## Scenario 4

Junaidah the Analyst, would like to see some report based on the activity in **Scenario 1, 2, 3**
She would like to know the answer to these questions:

- The number of unpaid orders vs paid in a month
- The cost incurred to generate weekly sales
- Average daily sales
- The inventory movement based on Paid Orders and Unpaid Orders

---

The scenarios above are inter-related. Based on your understanding of the scenarios, please answer the following:

1. What will your approach be in designing the database?
2. Write a function to process the vouchers based on the given conditions.
3. Write the query to answer Junaidah's questions.

### How To Submit Answer:

#### Fork this repo

1. Create a new branch in your repo

```php
Branch naming convention:
[your_initial]-[start_date DDMMYY]-[developer-test]
// For example a guy named John Smith would name it like JS-011218-developer-test
```

2. Create a pull request to this repository.
3. Directory structure is up to you.
4. Use your most comfortable Programming and Query language.