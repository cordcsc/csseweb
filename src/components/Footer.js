import React from "react";
import Styles from "./Footer.module.scss";

export default function Footer() {
  return (
    <footer>
      <h5>&copy; {new Date().getFullYear} CSSE Concordia College</h5>
    </footer>
  );
}
