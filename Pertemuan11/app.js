// import express
const express = require("express");
// import router
const router = require("./routes/api.js");
// membuat object express
const app = express();

/**
 * membuat routing
 * method get menerima 2 params
 * param 1 adalah endpoint
 * param 2 callback
 * callback menerima object req dan res
 */
// Menggunakan middleware
app.use(express.json());
app.use(express.urlencoded());

// menggunakan routing (router)
app.use(router);

app.get("/", (req, res) => {
    res.send("Hello Express");
});

// mendefinisikan port
const PORT = 3000;
app.listen(PORT, () => 
    console.log(`Server is running on http://localhost:${PORT}`));