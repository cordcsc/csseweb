import React from "react";
import PropTypes from "prop-types";
import Header from "./Header";
import Footer from "./Footer";
import Styles from "./Layout.module.scss";

const Layout = ({ children }) => {
  return (
    <div className={Styles.background}>
      <div className={Styles.container}>
        <Header />
        <main>{children}</main>
        <Footer />
      </div>
    </div>
  );
};

Layout.propTypes = {
  children: PropTypes.node.isRequired,
};

export default Layout;
