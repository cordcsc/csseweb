import React from "react";
import Layout from "../components/Layout";
import Styles from "./About.module.scss";
import { ReactComponent as TransparentPhone } from "../assets/TransparentPhone.svg";

export default function About() {
  return (
    <Layout>
      <div className={Styles.container}>
        <div className={Styles.left}>
          <h1>About</h1>
          <p>
            The Concordia College Computer Science and Engineering Club is a
            collection of students dedicated to furthering our knowledge of the
            industry. Our members are commited to learning the lastest
            technologies and best practices. Our work beyond our classes helps
            define who we are as developers and expand our knowledge beyond a
            textbook.
          </p>
        </div>
        <div className={Styles.right}>
          <TransparentPhone />
        </div>
      </div>
    </Layout>
  );
}
