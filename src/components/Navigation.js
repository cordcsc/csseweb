import React from "react";
import { NavLink } from "react-router-dom";
import Styles from "./Navigation.module.scss";

export default function Navigation() {
  return (
    <div className={Styles.container}>
      <NavLink activeClassName={Styles.active} exact to="/">
        <h2>Home</h2>
      </NavLink>
      <NavLink activeClassName={Styles.active} to="/about">
        <h2>About</h2>
      </NavLink>
      <NavLink activeClassName={Styles.active} to="/members">
        <h2>Members</h2>
      </NavLink>
      <NavLink activeClassName={Styles.active} to="/contact">
        <h2>Contact</h2>
      </NavLink>
    </div>
  );
}
