const express = require('express')
const app = express()
const path = require("path")
const port = 3000
const hbs = require("hbs")
const logincollection= require("./mongodb")

const templatepath = path.join(__dirname, '../templates')
const publicPath=path.join(__dirname,'../public')
console.log("publicPath")


app.set("view engine",'hbs')

app.set("views", templatepath)
app.use(express.static(publicPath))

app.use(express.json())
app.set("view engine", "hbs")
app.set("views", templatepath)

app.use(express.urlencoded({extended:false}))

app.get('/', (req, res) => {
  res.render('login')
})
app.get('/signup', (req, res) => {
  res.render('signup')
})


app.post("/signup", async (req, res) => {
  const data = {
    name: req.body.name,
    password: req.body.password,

  }
  await logincollection.insertMany([data])
  res.render("home")
})

app.post("/login", async (req, res) => {

  try{
    const check= await logincollection.findOne({name:req.body.name})
  if(check.password===req.body.password){
    res.render("home")
  }
  else{
    res.send("wrong password")
  }
  
  
  }
  catch{
    res.send("wrong details")
  }
})
app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})
