import React from "react";
import "./styles/global.scss";
// import "./styles/_include-media.scss";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import Home from "./pages/Home";
import About from "./pages/About";
import Members from "./pages/Members";
import Contact from "./pages/Contact";
import MemberPage from "./pages/MemberPage";

function App() {
  return (
    <Router>
      <Switch>
        <Route path="/" exact>
          <Home />
        </Route>
        <Route path="/about">
          <About />
        </Route>
        <Route path="/members" exact>
          <Members />
        </Route>
        <Route path="/contact">
          <Contact />
        </Route>
        <Route path="/members/:name" children={<MemberPage />} />
      </Switch>
    </Router>
  );
}

export default App;
