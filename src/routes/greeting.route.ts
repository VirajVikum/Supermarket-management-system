import { Router, Request, Response } from "express";

const router = Router();

router.get("/", (req: Request, res: Response) => {
  res.send("Hello World");
});

router.post("/", (req: Request, res: Response) => {
  const { name } = req.body;
  // const name = req.body.name;
  res.send(`Hellooo ${name}`);
});
export default router;
