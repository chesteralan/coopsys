import Badge from "@/components/ui/badge/Badge";
import { TableCell, TableRow } from "@/components/ui/table";
import { MemberItem as MemberItemType } from "@/typing/member";
import { Link } from "react-router";

type MemberItemProps = {
  member: MemberItemType;
};

export const MemberItem = ({ member }: MemberItemProps) => {
  return (
    <TableRow key={member.id}>
      <TableCell className="px-5 py-4 sm:px-6 text-start">
        <div className="flex items-center gap-3">
          <div className="w-10 h-10 overflow-hidden rounded-full"></div>
          <div>
            <span className="block font-medium text-gray-800 text-theme-sm dark:text-white/90">
              {member.first_name} {member.last_name}
            </span>
            <span className="block text-gray-500 text-theme-xs dark:text-gray-400">
              {member.occupation_type}
            </span>
          </div>
        </div>
      </TableCell>
      <TableCell className="px-4 py-3 text-gray-500 text-start text-theme-sm dark:text-gray-400">
        {member.contact_number}
      </TableCell>

      <TableCell className="px-4 py-3 text-gray-500 text-start text-theme-sm dark:text-gray-400">
        <Badge
          size="sm"
          color={
            member.address === "Active"
              ? "success"
              : member.address === "Pending"
                ? "warning"
                : "error"
          }
        >
          {member.address}
        </Badge>
      </TableCell>
      <TableCell className="px-4 py-3 text-gray-500 text-theme-sm dark:text-gray-400">
        {member.religion}
      </TableCell>
      <TableCell className="px-4 py-3 text-gray-500 text-theme-sm dark:text-gray-400">
        <Link
          to={`/members/view/${member.id}`}
          className="text-blue-600 hover:underline"
        >
          View
        </Link>
      </TableCell>
    </TableRow>
  );
};
