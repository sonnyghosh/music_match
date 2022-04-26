#makes connection to terminal and allows for inputs to be passed
args = commandArgs(TRUE)

library("httr", lib.loc="./rpkg")


r <- GET("http://httpbin.org/get")

#example pull from passed arguments
user_id <- as.numeric(args[1])

#example output that php can draw
print(user_id)
