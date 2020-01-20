import React from "react";
import MemberCard from "./MemberCard";

export default function MemberList({ members }) {
  const list = members.map(member => {
    return <MemberCard name={member.name} photoUrl={member.photoUrl} />;
  });

  return <div>{list}</div>;
}
