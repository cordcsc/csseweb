import React from "react";
import Styles from "./MemberCard.module.scss";
import { Link } from "react-router-dom";

export default function MemberCard({ name, photoUrl }) {
  return (
    <div className={Styles.card}>
      <Link to={`/members/${name}`}>
        <img src={photoUrl} alt={name} />
        <h3>{name}</h3>
      </Link>
    </div>
  );
}
