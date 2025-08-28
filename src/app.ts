// "use strict";
// Object.defineProperty(exports, "__esModule", { value: true });
// class App {
//     constructor() {
//         console.log("App Constructor");
//     }
// }
// exports.default = App;

import express, {Application} from "express";

const app:Application = express();

app.use(express.json());

app.get("/", (req,res) => {
    res.send("Hello World");
});

const PORT = 3001;
app.listen(PORT,()=> {
    console.log(`Server is running on port ${PORT}`);
});