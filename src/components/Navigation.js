import React from "react";
import { NavLink } from "react-router-dom";
import Styles from "./Navigation.module.scss";

export default function Navigation() {
  return (
    <div className={Styles.container}>
      <NavLink activeClassName={Styles.active} exact to="/">
        Home
      </NavLink>
      <NavLink activeClassName={Styles.active} to="/about">
        About
      </NavLink>
      <NavLink activeClassName={Styles.active} to="/members">
        Members
      </NavLink>
      <NavLink activeClassName={Styles.active} to="/contact">
        Contact
      </NavLink>
    </div>
  );
}
