// import { Router, Request, Response } from "express";

// const router = Router();

// router.get("/", (req: Request, res: Response) => {
//   res.send("Hello World");
// });

// router.post("/", (req: Request, res: Response) => {
//   const { name } = req.body;
//   // const name = req.body.name;
//   res.send(`Hellooo ${name}`);
// });
// export default router;




import { Router,Request,Response } from "express";

export class GreetingRoute{
    private static instance:GreetingRoute;

    public static getInstance():GreetingRoute{
        if(!GreetingRoute.instance){
            GreetingRoute.instance = new GreetingRoute();
        }
        return GreetingRoute.instance;
    }
    
    public router:Router;
    private constructor(){
        this.router = Router();
        this.setupRoutes();
    }

    private setupRoutes(){
        this.router.get("/", (req:Request, res:Response) => {
            res.send("Hello World");
        });

        this.router.post("/", (req:Request, res:Response) => {
            const {name} = req.body;
            res.send(`Hello ${name}`);
        });
    }
}
//controller
//service
//repo - mongo mysql postgres