#!/usr/bin/env python
# coding: utf-8


# Discount Voucher

from datetime import datetime

voucher={'code':"20FORME",'discount':0.2,'min_purchase':100,'expired_d':12,'expired_m':7,'expired_y':2019}
subtotal=200.0
shipping=0.0
date_now=datetime.date(datetime.now())
date=date_now.strftime("%d/%m/%Y")

print("Subtotal = RM", subtotal)
print("Shipping Fee = RM", shipping)
print("Voucher Code: ")
code=input()

def voucher20(code, voucher, subtotal,shipping, date):
    dd,mm,yy=date.split('/')
    dd=int(dd)
    mm=int(mm)
    yy=int(yy)
    total_amount=0
    t1=subtotal+shipping
    if (code == voucher['code'] and dd != 31 and mm+1 == voucher['expired_m'] and yy == voucher['expired_y'] and subtotal >= voucher['min_purchase']):
        total_amount=t1-(t1*voucher['discount'])
        return total_amount
    else:
        return t1
    
total=voucher20(code, voucher, subtotal,shipping, date)

print("Total = RM", total)


# # The number of unpaid orders vs paid in a month
# # The cost incurred to generate weekly sales
# # Average daily sales
# # The inventory movement based on Paid Orders and Unpaid Orders


# generate sample data
import pandas as pd
import datetime

d_1={'product':[5,8,12,6,2,10,9,3,12,10],'cost':[100,55,123.25,248.50,15.33,652.33,200, 631, 50, 20],
     'day':[1,2,2,3,5,2,3,3,3,3],'month':[6,6,6,6,6,5,5,4,4,4],'year':[2019,2019,2019,2019,2019,2019,2019,2019,2019,2019],
     'order_status':[0,1,1,1,0,0,1,1,1,1]}
df_1 = pd.DataFrame(data=d_1)

week=[]
for index, row in df_1.iterrows():
    week.append(datetime.date(int(row['year']), int(row['month']), int(row['day'])).isocalendar()[1])
    
df_1['week']=week
df_1



# The number of unpaid orders vs paid in a month

paid_month = []
unpaid_month = []
for i in range(1,13):
    paid_month.append(df_1.loc[(df_1['order_status'] == 1) & (df_1['month'] == i), 'order_status'].count())
    unpaid_month.append(df_1.loc[(df_1['order_status'] == 0) & (df_1['month'] == i), 'order_status'].count())
    
both=list(zip(paid_month,unpaid_month))

print("The number of unpaid orders vs paid in a month")
for j in range(len(both)):
    print("month: ", j+1, " number of paid: ", paid_month[j], " number of unpaid: ", unpaid_month[j])



# The cost incurred to generate weekly sales

total_week = datetime.date(2019, 12, 29).isocalendar()[1]
week_sale = []
for i in range(1,total_week+1):
    week_sale.append(df_1.loc[(df_1['week'] == i), 'cost'].sum())
    
print("The cost incurred to generate weekly sales")
    
for j in range(len(week_sale)):
    print("week: ", j+1, "sales: RM", week_sale[j])



# Average daily sales
from calendar import monthrange

# daily sales
day=[]
month=[]
sale=[]
for i in range(1, 13):
    for j in range(1,monthrange(2019, i)[1]):
        day.append(j) 
        month.append(i)
        sale.append(df_1.loc[(df_1['day'] == j) & (df_1['month'] == i), 'cost'].sum())
        
daily_sale = pd.DataFrame({'day':day, 'month':month, 'sales':sale})

month_sale = []
for i in range(1,13):
    month_sale.append(daily_sale.loc[(daily_sale['month'] == i), 'sales'].sum())
    
print("Average Daily Sales")
    
for i in range(len(month_sale)):
    print("month: ", i+1, "average daily sales: RM", month_sale[i]/monthrange(2019, i+1)[1])



# The inventory movement based on Paid Orders and Unpaid Orders

print("The inventory movement based on Paid Orders and Unpaid Orders")

tot_month=[]
paid=[]
unpaid=[]
for i in range(1,13):
    tot_month.append(df_1.loc[(df_1['month'] == i), 'product'].sum())
    paid.append(df_1.loc[(df_1['month'] == i) & (df_1['order_status'] == 1), 'product'].sum())
    unpaid.append(df_1.loc[(df_1['month'] == i) & (df_1['order_status'] == 0), 'product'].sum())

for n,i in enumerate(tot_month):
    if(n<11):
        tot_month[n+1]=tot_month[n]-paid[n]+tot_month[n+1]
        
for i in range(0,12):
    print("Month: ", i+1, " Paid Order: ", paid[i], " Unpaid Order: ", unpaid[i]," Inventory In: ", paid[i]+unpaid[i]," Inventory: ", tot_month[i], " Inventory Out: ", paid[i], " Remain: ", tot_month[i]-paid[i] )
      
