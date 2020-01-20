import React from "react";

export default function MemberCard({ name, photoUrl }) {
  return (
    <div>
      <img src={photoUrl} alt={name} />
      <h3>{name}</h3>
    </div>
  );
}
